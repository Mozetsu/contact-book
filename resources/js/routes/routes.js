import AllContacts from "../components/AllContacts.vue";
import CreateContact from "../components/CreateContact.vue";
import UpdateContact from "../components/UpdateContact.vue";

export const routes = [
    {
        name: "home",
        path: "/",
        component: AllContacts,
    },
    {
        name: "create",
        path: "/create",
        component: CreateContact,
    },
    {
        name: "update",
        path: "/update/:id",
        component: UpdateContact,
    },
];
