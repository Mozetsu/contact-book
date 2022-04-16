import APIController from "../controllers/api";

export const populateForm = async (form, contactID) => {
    const contact = await APIController.FetchContact(contactID);

    // update form with API response
    form.name = contact.name;
    form.email = contact.email;
    form.phone = contact.phone;
    form.country = contact.country;
};
