<?php

/* default/getComparaison.html.twig */
class __TwigTemplate_135fd805a06cc2f7c29d388bee22d66b83b8aff403980af09dfe2d08cda35d5e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "default/getComparaison.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "default/getComparaison.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "default/getComparaison.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 3
        echo "    ";
        if ((($context["articles"] ?? $this->getContext($context, "articles")) == null)) {
            // line 4
            echo "        l'article n'existe pas !!
    ";
        } else {
            // line 6
            echo "        <table>
            <thead>
            <tr class=\"active\">
                <th style=\"color:blue;\">Nom_Article</th>
                <th style=\"color:blue;\">Marque</th>
                <th style=\"color:blue;\">Prix</th>
                <th style=\"color:blue;\">Magasin</th>
            </tr>
            </thead>
            ";
            // line 15
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["articles"] ?? $this->getContext($context, "articles")));
            foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
                // line 16
                echo "                <tbody>
                <tr id=\"";
                // line 17
                echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "id", array()), "html", null, true);
                echo "\">
                    <td>";
                // line 18
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["article"], "idArticle", array()), "libelle", array()), "html", null, true);
                echo "</td>


                    <td> ";
                // line 21
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["article"], "idArticle", array()), "marque", array()), "html", null, true);
                echo "</td>

                    <td>";
                // line 23
                echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "prix", array()), "html", null, true);
                echo "</td>
                    <td>";
                // line 24
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["article"], "idMagasin", array()), "nommagasin", array()), "html", null, true);
                echo "</td>
                </tr>
                </tbody>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 28
            echo "        </table>
    ";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "default/getComparaison.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 28,  93 => 24,  89 => 23,  84 => 21,  78 => 18,  74 => 17,  71 => 16,  67 => 15,  56 => 6,  52 => 4,  49 => 3,  40 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}
{% block body %}
    {% if articles == null %}
        l'article n'existe pas !!
    {% else %}
        <table>
            <thead>
            <tr class=\"active\">
                <th style=\"color:blue;\">Nom_Article</th>
                <th style=\"color:blue;\">Marque</th>
                <th style=\"color:blue;\">Prix</th>
                <th style=\"color:blue;\">Magasin</th>
            </tr>
            </thead>
            {% for article in  articles %}
                <tbody>
                <tr id=\"{{ article.id }}\">
                    <td>{{ article.idArticle.libelle }}</td>


                    <td> {{ article.idArticle.marque }}</td>

                    <td>{{ article.prix }}</td>
                    <td>{{ article.idMagasin.nommagasin }}</td>
                </tr>
                </tbody>
            {% endfor %}
        </table>
    {% endif %}
{% endblock %}


", "default/getComparaison.html.twig", "/home/yan/Bureau/projet/app/Resources/views/default/getComparaison.html.twig");
    }
}
