<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
import APIController from "../../controllers/api";

const router = useRouter();

const form = ref({
    name: "",
    email: "",
    phone: "",
    country: "",
});

const errors = ref({
    name: "",
    email: "",
    phone: "",
    country: "",
});

const validateForm = async () => {
    // remove multiple whitespaces from strings
    form.value.name = form.value.name
        .toLowerCase()
        .replace(/\s\s+/g, " ")
        .trim();

    form.value.email = form.value.email.toLowerCase();

    form.value.country = form.value.country
        .toLowerCase()
        .replace(/\s\s+/g, " ")
        .trim();

    const { name, phone, country } = form.value;

    // regex
    const regexNumbers = /^[0-9]{9}$/;
    const regexSingleString = /[a-z]/gi;
    const regexStringWhitespace = /[a-z]+[ ]/gi;

    // validate string fields
    const isValidField = (field) => {
        return (
            field.length === 0 || // empty string
            field.match(/[0-9]/g) || // match numbers
            (!field.match(regexSingleString) &&
                !field.match(regexStringWhitespace)) // does not match letters only
        );
    };

    // validate name
    if (isValidField(name)) {
        const msg = "Name cannot be empty, and must contain only letters.";
        return (errors.value.name = msg);
    }

    // validate phone number
    if (phone.length === 0 || !regexNumbers.test(phone.toString())) {
        const msg = "Number provided does not match 9xx xxx xxx format.";
        return (errors.value.phone = msg);
    }

    // validate country
    if (isValidField(country)) {
        const msg = "Country cannot be empty, and must contain only letters.";
        return (errors.value.country = msg);
    }

    errors.value = {
        name: "",
        email: "",
        phone: "",
        country: "",
    };

    const contact = JSON.stringify(form.value);
    const { success } = await APIController.AddContact(contact);

    if (success) router.push("/");
};
</script>
<template>
    <form class="form" @submit.prevent="validateForm()">
        <section class="form__input">
            <div class="input-container">
                <label for="name">Name</label>
                <input
                    required
                    class="input"
                    id="name"
                    type="text"
                    placeholder="Enter name..."
                    name="name"
                    v-model="form.name"
                />
                <div class="error">{{ errors.name }}</div>
            </div>
            <div class="input-container">
                <label for="email">Email</label>
                <input
                    required
                    class="input"
                    id="email"
                    type="email"
                    placeholder="email@example.com"
                    name="email"
                    v-model="form.email"
                />
                <div class="error">{{ errors.email }}</div>
            </div>
            <div class="input-container">
                <label for="phone">Phone</label>
                <input
                    required
                    class="input"
                    id="phone"
                    type="number"
                    placeholder="9xx xxx xxx"
                    name="phone"
                    v-model="form.phone"
                />
                <div class="error">{{ errors.phone }}</div>
            </div>
            <div class="input-container">
                <label for="country">Country</label>
                <input
                    required
                    class="input"
                    id="country"
                    type="text"
                    placeholder="Country name..."
                    name="country"
                    v-model="form.country"
                />
                <div class="error">{{ errors.country }}</div>
            </div>
        </section>
        <section class="form__submit">
            <router-link class="stretch" to="/">
                <input class="btn btn--clear" type="button" value="cancel" />
            </router-link>
            <div class="stretch">
                <input class="btn btn--primary" type="submit" value="Save" />
            </div>
        </section>
    </form>
</template>
