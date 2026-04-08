# 👔 Shirt POS — Custom Tailored Order System

A **Laravel + Livewire** point-of-sale system for custom-tailored shirts. Customers can build their order by selecting fabric, collar, size, color, and more — with a **live shirt preview** that changes in real time.

---

## ✨ Features

- 🎨 **Live Shirt Customizer** — split-screen layout with a dynamic SVG shirt that reflects the color selection in real time
- 🧩 **Chip-based option selector** — no boring dropdowns, just clickable pill buttons and color swatches
- 💰 **Real-time price calculation** — total updates instantly as options are chosen
- 📦 **Guest checkout** — no login required; just name, phone, and address
- ✅ **Professional order success screen** — with animated checkmark and order reference number
- 🏠 **Homepage with product catalog** — hero section + product grid with "Customize Now" overlay

---

## 🛠️ Tech Stack

| Layer      | Technology              |
|------------|-------------------------|
| Backend    | PHP 8.3 / Laravel 13    |
| Frontend   | Livewire 3              |
| Styling    | Tailwind CSS v3 + Vite  |
| Database   | MySQL                   |

---

## 🚀 Getting Started

### 1. Clone the repository

```bash
git clone https://github.com/raghdahelmy/shirt-pos.git
cd shirt-pos
```

### 2. Install PHP dependencies

```bash
composer install
```

### 3. Install Node dependencies

```bash
npm install
```

### 4. Configure environment

```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` and set your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=shirt_pos
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Run database migrations & seed data

```bash
php artisan migrate:fresh --seed
```

This will create all tables and seed sample products (Premium Custom Shirt + Custom Tailored Pants) with all their attributes and options.

### 6. Start the development servers

Open **two terminal windows**:

**Terminal 1 — Laravel:**
```bash
php artisan serve
```

**Terminal 2 — Vite (Tailwind CSS):**
```bash
npm run dev
```

### 7. Open in browser

```
http://127.0.0.1:8000
```

---

## 📁 Key File Structure

```
app/
├── Livewire/
│   ├── HomePage.php           # Homepage component
│   └── ProductCustomizer.php  # Customizer logic
├── Models/
│   ├── Product.php
│   ├── Attribute.php
│   ├── AttributeOption.php
│   ├── Order.php
│   ├── OrderItem.php
│   └── OrderItemOption.php

resources/views/livewire/
├── home-page.blade.php           # Product catalog & hero
└── product-customizer.blade.php  # Split-screen customizer UI

database/
├── migrations/                # All table schemas
└── seeders/
    └── ProductSeeder.php      # Sample products & attributes

routes/
└── web.php                    # Route definitions
```

---

## 🗃️ Database Schema

```
products           → id, name, base_price, image
attributes         → id, name
attribute_options  → id, attribute_id, value, price_modifier
orders             → id, customer_name, customer_phone, customer_address, total_amount, status
order_items        → id, order_id, product_id, quantity, unit_price
order_item_options → id, order_item_id, attribute_option_id, attribute_name, option_value, price_modifier
```

---

## 🌐 Routes

| URL               | Description                     |
|-------------------|---------------------------------|
| `/`               | Homepage with product catalog   |
| `/customize/{id}` | Shirt customizer for product ID |

---

## 📄 License

MIT — free to use and modify.
