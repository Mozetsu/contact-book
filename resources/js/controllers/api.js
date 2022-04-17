import axios from "axios";
const API_BASE = "http://127.0.0.1:8000/api/";

export default {
    FetchContacts: async () => {
        const { data } = await axios(API_BASE + "contacts");
        return data;
    },
    FetchContact: async (id) => {
        const { data } = await axios(API_BASE + `contacts/${id}`);
        return data;
    },
    CreateContact: async (contact) => {
        const { data } = await axios.post(API_BASE + "contacts", contact);
        return data;
    },
    UpdateContact: async (body, id) => {
        const { data } = await axios.put(
            API_BASE + `contacts/update/${id}`,
            body
        );
        return data;
    },
    DeleteContact: async (id) => {
        const { data } = await axios.delete(API_BASE + `contacts/${id}`);
        return data;
    },
};
