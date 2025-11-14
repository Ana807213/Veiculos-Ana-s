# 🚗 Veículos Ana's  
Sistema de gerenciamento e catálogo de veículos com área pública e área administrativa completa.

Este projeto oferece uma plataforma moderna, responsiva e animada para exibição de veículos, com filtros por marca, visualização detalhada e painel administrativo para controle de marcas, modelos, cores e veículos.

---

## ✨ **Funcionalidades**

### 🔹 Área Pública
- Página inicial com banner e chamada para ação  
- Listagem completa de veículos  
- Filtro por marcas  
- Cards animados com informações  
- Página de detalhes do veículo  
- Layout limpo, profissional e responsivo  
- Animações suaves (fade, hover, zoom, slide)  

### 🔹 Área Administrativa
- Login seguro para administradores  
- Dashboard completo  
- Gerenciamento de:
  - 🚘 Veículos  
  - 🏷️ Marcas  
  - 🎨 Cores  
  - 🚗 Modelos  
- Telas de cadastro, edição e listagem  
- Interface moderna e funcional  

---

## 🛠️ Tecnologias Utilizadas

- Laravel 10+ 
- PHP 8+ 
- MySQL 
- Blade Templates
- Bootstrap 5*
- CSS3 + Animações
- Font Awesome 
- JavaScript
- Git/GitHub

---

## 🚀 Instalação

### 1️⃣ Clone o projeto
bash
git clone https://github.com/Ana807213/Veiculos-Ana-s.git

2️⃣ Instale as dependências
composer install

3️⃣ Configure o .env
cp .env.example .env

Defina o banco de dados:
DB_CONNECTION=sqlite
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=venda_veiculos_anas
DB_USERNAME=root
DB_PASSWORD=

4️⃣ Gere a key
php artisan key:generate

5️⃣ Execute as migrations
php artisan migrate

6️⃣ Inicie o servidor
php artisan serve

Acesse:
👉 http://localhost:8000
🖼️ Banner Inicial
🖼️ Página Pública (Home)
🖼️ Página Pública – Lista de Veículos
🖼️ Página de Detalhes do Veículo
🔐 Login
🧰 Área Administrativa
🖼️ Dashboard Principal
🖼️ Dashboard de Veículos
🖼️ Cadastro de Veículo
🏷️ Gerenciamento de Marcas, Modelos e Cores
📌 Dashboard de Marcas
➕ Cadastro de Marca
📌 Dashboard de Modelos
➕ Cadastro de Modelo
📌 Dashboard de Cores
➕ Cadastro de Cor

🙋‍♀️ Autora
Ana Laura e Ana Paula 
Projeto criado para estudo e uso real em loja de veículos.

GitHub: https://github.com/Ana807213
