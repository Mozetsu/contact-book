import AllContacts from "../components/AllContacts.vue";
import AddContact from "../components/AddContact.vue";
import EditContact from "../components/EditContact.vue";

export const routes = [
    {
        name: "home",
        path: "/",
        component: AllContacts,
    },
    {
        name: "add",
        path: "/add",
        component: AddContact,
    },
    {
        name: "edit",
        path: "/edit/:id",
        component: EditContact,
    },
];
