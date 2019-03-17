import DashboardLayout from "../pages/Layout/DashboardLayout.vue";

import Dashboard from "../pages/Dashboard.vue";
import UserProfile from "../pages/UserProfile.vue";
import TableList from "../pages/TableList.vue";
import Typography from "../pages/Typography.vue";
import Icons from "../pages/Icons.vue";
import Maps from "../pages/Maps.vue";
import Notifications from "../pages/Notifications.vue";
import UpgradeToPRO from "../pages/UpgradeToPRO.vue";
import Tasks from "../pages/Tasks.vue";

const routes = [
  {
    path: "/",
    component: DashboardLayout,
    title: "Dashboard home",
    metaTags: [
        {
            name: 'description',
            content: 'Home page of the dashboard application app'
        },
        {
            property: 'og:description',
            content: 'Home page of the dashboard application app'
        }
    ],
    redirect: "/dashboard",
    children: [
      {
        path: "dashboard",
        name: "Dashboard",
        metaTags: [
            {
                name: 'description',
                content: 'Dashboard.'
            },
            {
                property: 'og:description',
                content: 'Dashboard.'
            }
        ],
        component: Dashboard
      },
      {
        path: "user",
        name: "User Profile",
        metaTags: [
          {
              name: 'description',
              content: 'User Profile'
          },
          {
              property: 'og:description',
              content: 'User Profile.'
          }
        ],
        component: UserProfile
      },
      {
        path: "table",
        name: "Table List",
        title: "Table List",
        metaTags: [
          {
              name: 'description',
              content: 'Table List.'
          },
          {
              property: 'og:description',
              content: 'Table List.'
          }
        ],
        component: TableList
      },
      {
        path: "tasks",
        name: "Tasks",
        title: "Tasks",
        metaTags: [
          {
              name: 'description',
              content: 'Tasks.'
          },
          {
              property: 'og:description',
              content: 'Tasks.'
          }
        ],
        component: Tasks
      },
      {
        path: "typography",
        name: "Typography",
        component: Typography
      },
      {
        path: "icons",
        name: "Icons",
        component: Icons
      },
      {
        path: "maps",
        name: "Maps",
        meta: {
          hideFooter: true
        },
        component: Maps
      },
      {
        path: "notifications",
        name: "Notifications",
        component: Notifications
      },
      {
        path: "upgrade",
        name: "Upgrade to PRO",
        component: UpgradeToPRO
      }
    ]
  }
];

export default routes;
