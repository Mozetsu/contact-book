import AllContacts from "../components/AllContacts.vue";
import CreateContact from "../components/CreateContact.vue";
import UpdateContact from "../components/UpdateContact.vue";
import NotFound from "../components/NotFound.vue";

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
        path: "/update",
        component: UpdateContact,
    },
    {
        name: "404",
        path: "/:pathMatch(.*)*",
        component: NotFound,
    },
];
