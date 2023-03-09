
# Apoyar Human

Application destined to integrate multiple tools in order to manage the workflow of Apoyar as a company. This app should handle employee work logs, client projects, activities, leaves, holidays, invoicing, expensing...


## Installation

Fetch project from repository

```bash
git clone https://gitlab.apoyar.eu/lokeshd/HRMS.git
```
Install all npm packages and update the code igniter project

```bash
cd HRMS
composer update
npm install
```
    
### Requirements

- NodeJS
- Composer
- PHP

## How to build the project for Production

Using tailwindcss means we must switch from the CDN link in development to building the CSS for production. In the root of the project, just run this command (making sure all system requirements have been met) and your production build will be ready.

```bash
  npx mix
```

## Documentation

[Code Igniter 4](https://codeigniter.com/user_guide/index.html)

[Tailwind CSS](https://tailwindcss.com/)# CI4-tailwind
