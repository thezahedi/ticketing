import Home from './components/Home';
import Tickets from './components/Tickets';
import Settings from './components/Settings';
import Ticket from "./components/Ticket";
import Units from "./components/Units";
import Users from "./components/Users";
import User from "./components/User";
import Unit from "./components/Unit";

export default [
    {
        path: '/',
        name: '#home',
        component: Home,
    },
    {
        path: '/tickets',
        name: '#tickets',
        component: Tickets,
    },
    {
        path: '/tickets/:id',
        name: '#showTicket',
        component: Ticket,
    },
    {
        path: '/settings',
        name: '#settings',
        component: Settings,
    },
    {
        path: '/users',
        name: '#users',
        component: Users,
    },
    {
        path: '/units',
        name: '#units',
        component: Units,
    },
    {
        path: '/users/:id',
        name: '#showUser',
        component: User,
    },
    {
        path: '/units/:id',
        name: '#showUnit',
        component: Unit,
    }
];
