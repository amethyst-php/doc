## Amethyst

The purpose of this project is to create a collection of packages to standardize and facilitate the developing process of common problems when building the backend of a general purpose project.

Usually when you're building an application, the type of project influences the choice you will make: Building a crm? Searching for an open-source crm. Building a blog? Searching for an open-source blog. Building an e-commerce? Well, you can guess it. The problem with this is that each project will start from a different base, making difficult to maintain all of them. Do you want to add a cool package that can be extremly usefull for all your projects? Cool, but now you have to create controllers, tests, validators in different ways because each of your project use different logics and solve the problem differently.

The solution? Start building packages that solve only one problem, and create your project like a puzzle.

[Source](https://github.com/railken/amethyst)

# {{ composer.extra().amethyst.package }}

{{ composer.description() }}

## Installation

You can install it via [Composer](https://getcomposer.org/) by typing the following command:

```bash
composer require {{ composer.name() }}
```