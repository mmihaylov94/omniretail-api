# OmniRetail API

**OmniRetail API** is the backend service for the OmniRetail retail operations platform.  
Built with **CodeIgniter 4 (PHP)** and **MariaDB**, it provides an **API-first** foundation for product management, inventory tracking, POS sales, order lifecycle workflows, and reporting.

This repository contains **all backend domain logic** and exposes a JSON API consumed by the React frontend.

---

## Purpose

This project is portfolio-grade backend work focused on:

- Clean CodeIgniter 4 architecture (Controllers → Services → Repositories/Models)
- Strong domain modeling for retail workflows (inventory, POS, orders)
- Role-based access control (RBAC)
- Secure API design and validation
- Audit-friendly inventory tracking

---

## Architecture Overview

- **CodeIgniter 4** runs as an API service
- **MariaDB** stores operational data (products, inventory ledger, orders, users)
- **JSON REST-style endpoints**
- Domain logic in **Services**
- Authorization via **RBAC** (roles/permissions)

---

## Planned / Not Yet Implemented Features

> Unless stated otherwise, features are shared with the frontend project and require UI + API support.

### Authentication & Access Control
- User login/logout
- Role-based access control (Admin / Manager / Staff / Cashier)
- User management (create, disable/enable, role assignment)
- Session-based auth (same-origin) or token-based auth (JWT/opaque)
- Password reset workflow (email)
- Optional Google OAuth for staff login

### Products & Catalog
- Product CRUD (name, SKU, barcode, price, status)
- Product variants (size/color) support (optional extension)
- Category/collection support
- Product search/filter endpoints
- Product import/export (CSV)

### Inventory Management
- Ledger-based stock movements (stock-in, stock-out, adjustments)
- Stock on hand calculation derived from ledger
- Low stock thresholds and alerts
- Inventory history per product (auditable)
- Multi-location inventory (future extension)
- Stock reservations (for pending orders)

### POS & Checkout Workflows
- Cart-based checkout endpoint
- Cash sale recording
- Payment records (cash/manual first, gateways later)
- Receipt data payload generation
- Barcode-first scanning workflow support
- Refunds (full/partial) with inventory reconciliation

### Orders & Sales
- Order creation + order items
- Order lifecycle states (Pending → Completed / Cancelled / Refunded)
- Order status transitions with validation rules
- Sales attribution to staff user
- Order search and date filtering

### Reporting
- Daily sales totals
- Sales by date range
- Top-selling products
- Low-stock report
- Simple revenue summaries
- Exportable reports (CSV)

### Audit & Operational Safety
- Audit log for:
  - inventory adjustments
  - order status changes
  - product edits
  - user/role changes
- Concurrency-safe stock deductions (transaction + locking strategy)
- Soft deletes where appropriate

### Security
- Input validation (server-side)
- Output encoding / safe serialization
- Rate limiting on auth and POS endpoints
- CORS configuration for separated frontend deployments
- CSRF for session-based auth (if used)

---

## API Conventions (Planned)

- Base path: `/api/v1`
- JSON request/response format
- Consistent error format:
  - `code`, `message`, `errors[]`
- Pagination for list endpoints
- Sorting and filtering via query params

---

## Tech Stack

- PHP 8.3+
- CodeIgniter 4
- MariaDB
- Composer
- Docker (recommended)

---

## Environment Configuration (Planned)

Copy `.env.example` to `.env` and configure:

- `app.baseURL`
- database DSN / host / user / password
- session or token auth settings
- CORS allowed origins (if frontend on different domain)
- SMTP (optional, for password reset)

---

## Repository Notes

This repo is intended to run independently as a backend service and can be deployed behind a reverse proxy (e.g., Traefik).

Frontend repo: [**omniretail-app**](https://github.com/mmihaylov94/omniretail-app)
