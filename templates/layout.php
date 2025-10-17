{# templates/base.html.twig #}
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{% block title %}Mon site{% endblock %}</title>


    {% block stylesheets %}
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    {% endblock %}
</head>

<body>
    <header>
        <nav aria-label="Navigation principale">
            <ul class="structureNavBarre">
                <li><a href="{{ path('app_home') }}" class="buttonNav">Home</a></li>
                <li><a href="{{ path('app_tasks_create') }}" class="buttonNav">Task</a></li>
                <li><a href="{{ path('app_contact') }}" class="buttonNav">Contact</a></li>

            </ul>

        </nav>
    </header>

    <main>
        {% block body %}{% endblock %}
    </main>
    <footer>
        <p>&copy; 2025 MonSite MVC — Tous droits réservés.</p>
    </footer>
</body>

</html>