# My Vite React App

Simple Vite Project to learn how to integrate Storybook in a React App with Multi Theming.

## Setup

Before starting install dependencies with:

```cmd
npm i
```

## Available Scripts

Here is a list of the package scripts included in the project and its descriptions.

| Script | Description | Status |
| --- | --- | --- |
| `npm run dev` | Init **Local Web Server** with Hot Module Reload (HMR). | **OK** |
| `npm run watch` | Build and **Watch** the project in DEV Mode. Files will be saved on `dist` folder. | **FAIL\*** |
| `npm run build` | Build the project in PROD Mode. Files will be saved on `dist` folder. | **OK** |
| `npm run preview` | Run current build (DEV or PROD) in a Local Web Server. | **OK** |
| `npm run storybook` | Open Storybook. It can be running in parallel with any other script. | **OK** |

**Aditional Notes**

> **\*** `npm run watch` is extremly slow! Not recommended. <br/>
> **IMPORTANT:** To see readable code in browser it is needed to include SourceMaps in build parameters. See: https://vitejs.dev/config/build-options.html#build-sourcemap


## Configure Backend Entry Point

As a probe of concept, the project includes a `www` folder with a simple PHP entry point (`index.php`).

This folder can be copied or linked into an Apache/PHP local server for running the project adding custom way to load and execute the project like a real enviroment. To see more info about how this works visit https://vitejs.dev/guide/backend-integration.html.

For example, you can link the `www` folder with `C:\xampp\htdocs\myvite`, then you can acces the site with http://localhost/myvite/ using XAMPP on Windows.

## Running Development Enviroment

Start the local web server with and keep running:

```cmd
npm run dev
```

Then, open your local backend entry point. For example: http://localhost/myvite/

All changes will be updated in the browser without reloading.

### Using Themes

To load the **default** theme use: http://localhost/myvite/?theme=default

To load the **colorize** theme use: http://localhost/myvite/?theme=colorize

## Running PROD Enviroment

First of all build the project with:

```cmd
npm run build
```

When finished, open your local backend entry point with the param `mode=prod`

For example: http://localhost/myvite/?mode=prod

### Using Themes

To load the **default** theme use: http://localhost/myvite/?mode=prod&theme=default

To load the **colorize** theme use: http://localhost/myvite/?mode=prod&theme=colorize

## Storybook

To access the Storybook run the server with `npm run storybook` and it will open the server at http://localhost:6006/.

### Using Themes

This version provides a way to change Application Theme based on **background** selector in the component preview window.

You can select between:

 - none
 - default
 - colorize

And then you can see changes in real time into de canvas preview.
