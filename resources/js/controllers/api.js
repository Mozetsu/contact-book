import axios from "axios";
const API_BASE = "http://127.0.0.1:8000/api/";

export default {
    FetchContacts: async () => {
        const response = await fetch(API_BASE + "contacts");
        const data = await response.json();

        if (!data.success) throw data.response.error;

        return data.response.contacts;
    },
    AddContact: async (contact) => {
        const { data } = await axios.post(API_BASE + "contacts", contact);

        if (!data.success) throw data.response.error;

        return data;
    },
    DeleteContact: async (id) => {
        const response = await fetch(API_BASE + "contacts/" + id, {
            method: "DELETE",
        });
        const data = await response.json();

        if (!data.success) throw data.response.error;

        return data.response.contacts;
    },
};
