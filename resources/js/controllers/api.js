import axios from "axios";
const API_BASE = "http://127.0.0.1:8000/api/";

export default {
    FetchContacts: async () => {
        const { data } = await axios(API_BASE + "contacts");
        if (!data.success) throw data.response.error;
        return data.response.contacts;
    },
    FetchContact: async (id) => {
        const { data } = await axios(API_BASE + `contacts/${id}`);
        if (!data.success) throw data.response.error;
        return data.response.contact;
    },
    CreateContact: async (contact) => {
        const { data } = await axios.post(API_BASE + "contacts", contact);
        if (!data.success) throw data.response.error;
        return data;
    },
    UpdateContact: async (body, id) => {
        const { data } = await axios.put(
            API_BASE + `contacts/update/${id}`,
            body
        );
        console.log(data);
        if (!data.success) throw data.response.error;
        return data;
    },
    DeleteContact: async (id) => {
        const { data } = await axios.delete(API_BASE + `contacts/${id}`);
        if (!data.success) throw data.response.error;
        return data.success;
    },
};
