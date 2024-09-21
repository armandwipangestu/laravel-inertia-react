import "./bootstrap";
import "../css/app.css";

// import React from "react";
// import { createRoot } from "react-dom/client";
// import { InertiaApp } from "@inertiajs/inertia-react";
// import { InertiaProgress } from "@inertiajs/progress";
// import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";

// const appName =
//     window.document.getElementsByTagName("title")[0]?.innerText || "Laravel";

// const el = document.getElementById("app");

// createRoot(el).render(
//     <InertiaApp
//         initialPage={JSON.parse(el.dataset.page)}
//         resolveComponent={(name) =>
//             resolvePageComponent(
//                 `./Pages/${name}.jsx`,
//                 import.meta.glob("./Pages/**/*.jsx")
//             )
//         }
//         titleTemplate={`%s - ${appName}`}
//     />
// );

// InertiaProgress.init({ color: "#4B5563" });

import { createRoot } from "react-dom/client";
import { createInertiaApp } from "@inertiajs/react";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";

const appName = import.meta.env.VITE_APP_NAME || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.jsx`,
            import.meta.glob("./Pages/**/*.jsx")
        ),
    setup({ el, App, props }) {
        const root = createRoot(el);

        root.render(<App {...props} />);
    },
    progress: {
        color: "#4B5563",
    },
});
