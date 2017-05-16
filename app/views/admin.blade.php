<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demo | Admin Panel</title>
</head>
<body>
    <div id="app">
        <h1>Route props</h1>
        <ul>
          <!-- use router-link component for navigation. -->
          <!-- specify the link by passing the `to` prop. -->
          <!-- <router-link> will be rendered as an `<a>` tag by default -->
          <li><router-link to="/user/juan">User</router-link></li>
          <li><router-link :to="{ name: 'user', params: { userId: 123 }}">User</router-link></li>

          <li><router-link to="/hello/you">/hello/you</router-link></li>
          
          <li><router-link to="/dashboard">Go to dash</router-link></li>
          <li><router-link to="/foo">Go to Foo</router-link></li>
          <li><router-link to="/bar">Go to Bar</router-link></li>
          <li><router-link to="/*">not found</router-link></li>
        </ul>
      <router-view class="view"></router-view>
    </div>

    <script src="/js/plugin/vue/vue-2.3.3.js"></script>
    <script src="/js/plugin/vue/vue-router-2.5.3.js"></script>

    <script type="text/javascript">

        const Foo = { template: '<div>foo</div>' }
        const Bar = { template: '<div>bar</div>' }

        // dashboard component
        const dashboard = {
            template: '<p>Hello from dashboard</p>'
        }

        // user management component
        /*const user = {
            template: '<p>Hello from user management page</p>'
        }*/
        const User = {
            props: ['userId'],
            template: '<div>User @{{ userId }}</div>'
        }
        const Hello = {
            props: ['name'],
            template: '<div> <h2 class="hello">Hello @{{name}}</h2> </div>'
        }

        // 404
        const fourohfour = {
            template: '<p>Oh noes, four oh foes</p>'
        }

        // create our vm instance
        // set our template to display the component selected 
        // by the router
        /*const app = Vue.extend({
            template: '<router-view></router-view>'
        })*/
        const routes =[
            // dynamic segments start with a colon
            //{ path: '/user/:id', component: User },
            { path: '/hello/:name', component: Hello, props: true },
            { path: '/user/:userId', name: 'user', props: true, component: User },
            { path: '/dashboard', component: dashboard },
            { path: '/foo', component: Foo },
            { path: '/bar', component: Bar },
            { path: '*', component: fourohfour }
        ]
        // configure the router
        // using HTML5 history mode
        const router = new VueRouter({
           // history: true,
           //mode:'history',
            //saveScrollPosition: true,
            //root: '/admin',
            mode: 'history',
            base: 'admin',
            routes
        })
        const app = new Vue({
            router
        }).$mount('#app')
        // map our frontend routes
/*        router.map({
            '*': {
                component: fourohfour
            },
            '/dashboard': {
                component: dashboard
            },
            '/users': {
                component: user
            }
        })
*/
        // initialize the router and mount to #app
        //router.start(app, '#app')
    </script>
</body>
</html>