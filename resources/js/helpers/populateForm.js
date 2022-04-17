import APIController from "../controllers/api";

export const populateForm = async (form, contactID) => {
    const { response } = await APIController.FetchContact(contactID);
    const { contact } = response;

    // update form with API response
    form.name = contact.name;
    form.email = contact.email;
    form.phone = contact.phone;
    form.country = contact.country;
};
