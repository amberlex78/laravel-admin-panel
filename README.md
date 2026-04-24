# 🚀 Laravel Admin Panel Starter

**Laravel Admin Panel Starter** — це сучасний, чистий шаблон для швидкого старту проектів на **Laravel 13**. Він включає готову адмін-панель, Docker-інфраструктуру, яка забезпечує швидке розгортання та управління проектом, а також включає готову систему управління користувачами.

## ⚙️ Основні можливості

- **Laravel 13**: стабільна версія фреймворку.
- **Docker-інфраструктура**: готові `Dockerfile` та `docker-compose.yml` для швидкого розгортання.
- **Базова адмін-панель**: готова система управління користувачами.

## 🛠️ Вимоги

- Docker
- Docker Compose v2

## 📦 Встановлення

```bash
git clone https://github.com/amberlex78/laravel-admin-panel.git
cd laravel-admin-panel
make init
make migrate-fresh
```

Буде створено користувачі з наступними даними:

**адміністратор**:

> Email: admin@example.com

> Пароль: password

**звичайний користувач**:

> Email: user@example.com

> Пароль: password

Потім ви можете отримати доступ до адмін-панелі за адресою: http://localhost:8000/admin або http://localhost:8000/dashboard
