<script setup>
import { defineProps, onMounted, reactive, toRefs } from "vue";
import { useRouter } from "vue-router";
import { validateForm, populateForm } from "../../helpers";
import APIController from "../../controllers/api";

const router = useRouter();

const props = defineProps({
    action: String,
});

const { action } = toRefs(props);
const contactID = window.location.pathname.split("/")[2];

const form = reactive({
    name: "",
    email: "",
    phone: "",
    country: "",
});

const errors = reactive({
    name: "",
    email: "",
    phone: "",
    country: "",
});

onMounted(() => {
    if (action.value === "UPDATE") populateForm(form, contactID);
});

const handleFormSubmit = async () => {
    const isValidForm = validateForm(form, errors);

    if (!isValidForm) return;

    const contact = JSON.stringify(form);

    // create new contact
    if (action.value === "CREATE") {
        const { success } = await APIController.CreateContact(contact);
        if (success) router.push("/");
    }

    // update contact
    if (action.value === "UPDATE") {
        const { success } = await APIController.UpdateContact(
            contact,
            contactID
        );

        if (success) router.push("/");
    }
};
</script>

<template>
    <form class="form" @submit.prevent="handleFormSubmit(action)">
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
