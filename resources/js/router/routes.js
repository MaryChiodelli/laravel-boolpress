import Home from '../pages/Home.vue';
import AboutUs from '../pages/AboutUs.vue';
import ContactUs from '../pages/ContactUs.vue';
import PostsIndex from '../pages/Posts.index.vue';
import PostsShow from '../pages/Posts.show.vue';
import Page404 from '../pages/404.vue';

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/chi-siamo',
        name: 'about-us',
        component: AboutUs
    },
    {
        path: '/contatti',
        name: 'contact-us',
        component: ContactUs
    },
    {
        path: '/blog',
        name: 'posts.index',
        component: PostsIndex
    },
    {
        path: '/blog/:slug',
        name: 'posts.show',
        component: PostsShow,
        props: true
    },
    {
        path: '/*',
        name: '404',
        component: Page404
    }
];

export default routes;