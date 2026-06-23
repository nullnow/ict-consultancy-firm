# CMS Handover Notes for DIMA Project Manager

## How to Use the CMS

Login is at `https://www.opes.co.tz/auth/login`. Username is `admin` and password is `opes+255!=@#`.

Upon logging in, you will see the homepage with all the current page settings.

In the navigation bar you will find a link to the _Dashboard_, _Homepage_ settings, as well as links to the responses for _Demo Requests_ and _Contact Forms_. There is also a _Logout_ link.

The dashboard is authentication protected and pages can not be visited without logging in.

## Technical Infrastructure

### 1. High-level architecture

- This application is a **NestJS** server-side app built with **TypeScript**.
- It uses **Express** under the hood via `@nestjs/platform-express`.
- The front-end is rendered server-side using **EJS templates** in views.
- Static assets such as CSS, images, and JS files are served from public.
- Content is managed via a set of server-rendered admin pages rather than a separate headless CMS.

### 2. Core infrastructure

- main.ts
    - Configures Express middleware
    - Enables `express-session` for user sessions
    - Serves static assets from public
    - Sets views as the template directory
    - Starts the server on `PORT` or default `3000`

- app.module.ts
    - Loads environment configuration via `@nestjs/config`
    - Connects to MongoDB using `@nestjs/mongoose`
    - Registers modules for:
        - `Homepage`
        - `Auth`
        - `Admin`
        - `Service Pages`
        - `Demo Requests`
        - `About`
        - `FAQ`
        - `Contact`

### 3. Data and persistence

- Database: **MongoDB**
- ODM: **Mongoose**
- Schemas are defined per feature under `src/**/schemas/`
- Key data stores:
    - homepage content
    - about page content
    - FAQ content
    - service page content
    - contact page content
    - contact form submissions
    - demo requests
    - user accounts

### 4. Admin and CMS behavior

- Admin access is protected by middleware in auth.middleware.ts
- The middleware checks `req.session.user` and redirects unauthenticated users to `/auth/login`
- Admin routes are grouped around:
    - `/admin`
    - `/contact/admin/*`
    - `/homepage/admin/*`
    - `/faq/admin/*`
    - `/service-pages/admin/*`
- The admin interface is built in admin and other `*/admin-edit.ejs` templates.

### 5. Authentication

- Auth routes live in auth
- Login, register, logout, and password reset are handled through server-side forms
- Session secret comes from `SECRET_KEY`
- The application currently uses session-based auth rather than JWT or OAuth

### 6. Forms and notifications

- `ContactService` and `DemoRequestService` send notification emails via **Resend**
- Contact form submissions:
    - saved to MongoDB
    - emailed to the admin address
- Demo requests:
    - saved to MongoDB
    - emailed to the admin address
- Env vars used for email:
    - `RESEND_API_KEY`
    - `ADMIN_EMAIL`
    - `RESEND_FROM_EMAIL`
    - `APP_URL` is used in demo request email links

### 7. Page / module coverage

- `homepage/` — homepage content and admin editing
- `about/` — about page content and admin editing
- `faq/` — FAQ page and admin editing
- `service-pages/` — service page listing and editing
- `contact/` — contact page content, response storage, admin review
- `demo-request/` — demo request intake and admin review
- `admin/` — main admin landing/dashboard

### 8. Deployment & run commands

- Install: `pnpm install`
- Dev run: `pnpm run start:dev`
- Prod build: `pnpm run build`
- Prod start: `pnpm run start:prod`
- Testing:
    - unit: `pnpm run test`
    - e2e: `pnpm run test:e2e`

### 9. Important environment variables

- `MONGO_URI` — MongoDB connection string
- `SECRET_KEY` — session encryption secret
- `PORT` — server port
- `RESEND_API_KEY` — email provider key
- `ADMIN_EMAIL` — destination for admin notifications
- `RESEND_FROM_EMAIL` — sender email fallback
- `APP_URL` — front-end URL used in email links

### 10. Nuanced notes

- The CMS is not a separate SaaS product; it's embedded in the app via **server-rendered admin pages**.
- Content editing is implemented per page/module rather than through a single global content model.
- If the app is deployed behind a proxy or load balancer, ensure session handling and `SECRET_KEY` are consistent across instances.
- The `ServeStaticModule` excludes some API paths explicitly, so admin and API routes are still routed via NestJS.
