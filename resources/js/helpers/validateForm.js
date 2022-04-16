export const validateForm = async (form, errors) => {
    // remove multiple whitespaces from strings
    form.name = form.name.toLowerCase().replace(/\s\s+/g, " ").trim();

    form.email = form.email.toLowerCase();

    form.country = form.country.toLowerCase().replace(/\s\s+/g, " ").trim();

    const { name, phone, country } = form;

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
        errors.name = msg;
        return false;
    }

    // validate phone number
    if (phone.length === 0 || !regexNumbers.test(phone.toString())) {
        const msg = "Number provided does not match 9xx xxx xxx format.";
        errors.phone = msg;
        return false;
    }

    // validate country
    if (isValidField(country)) {
        const msg = "Country cannot be empty, and must contain only letters.";
        errors.country = msg;
        return false;
    }

    errors = {
        name: "",
        email: "",
        phone: "",
        country: "",
    };

    return true;
};
