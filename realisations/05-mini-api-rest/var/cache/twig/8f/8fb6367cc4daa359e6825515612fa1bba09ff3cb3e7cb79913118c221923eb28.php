<?php

/* index.html.twig */
class __TwigTemplate_a15e4098d3896e68503c96e95783c848972007206b97eab3d926f749bb5b411c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html.twig", "index.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_06c87db30732a4e7e0510d6bad57ef264d039ddd3f4da33e97d7ea5d77d3c826 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_06c87db30732a4e7e0510d6bad57ef264d039ddd3f4da33e97d7ea5d77d3c826->enter($__internal_06c87db30732a4e7e0510d6bad57ef264d039ddd3f4da33e97d7ea5d77d3c826_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "index.html.twig"));

        $__internal_a14a4000c1640863406fa30b34f9ab690cf7172e927509163179eaf277fbdae2 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_a14a4000c1640863406fa30b34f9ab690cf7172e927509163179eaf277fbdae2->enter($__internal_a14a4000c1640863406fa30b34f9ab690cf7172e927509163179eaf277fbdae2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_06c87db30732a4e7e0510d6bad57ef264d039ddd3f4da33e97d7ea5d77d3c826->leave($__internal_06c87db30732a4e7e0510d6bad57ef264d039ddd3f4da33e97d7ea5d77d3c826_prof);

        
        $__internal_a14a4000c1640863406fa30b34f9ab690cf7172e927509163179eaf277fbdae2->leave($__internal_a14a4000c1640863406fa30b34f9ab690cf7172e927509163179eaf277fbdae2_prof);

    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        $__internal_753785a0702a0069249095f62fca14a9720bc10c0be18460d53124b6641979ca = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_753785a0702a0069249095f62fca14a9720bc10c0be18460d53124b6641979ca->enter($__internal_753785a0702a0069249095f62fca14a9720bc10c0be18460d53124b6641979ca_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_50d1e086d15f0ef11c98b072a9fad1d451568234ee54efee4361fccfe48ba080 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_50d1e086d15f0ef11c98b072a9fad1d451568234ee54efee4361fccfe48ba080->enter($__internal_50d1e086d15f0ef11c98b072a9fad1d451568234ee54efee4361fccfe48ba080_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 4
        echo "    
    <h1 id='colorWhite'>Welcome to my first API REST which aims at managing users and their tasks</h1><br>
    
    ";
        // line 8
        echo "    ";
        // line 9
        echo "    
    ";
        // line 11
        echo "    <p id=\"viewAllUsers\">
        <u>View all users</u>
    </p>
        
    <div id=\"usersZone\">
        <ul>
        </ul>
    </div>

    <p id=\"msgZoneDeleteUser\">
    </p>
    
    <div id=\"tasksZone\">
        ";
        // line 25
        echo "    </div>

    <p id=\"msgZoneDeleteTask\">
    </p>
    
    <div id=\"addTaskZone\">
        <form id=\"formAddTask\" method=\"post\" action=\"\">
            <div>
                <label>Title : </label>
                <input type=\"text\" name=\"title\">
            </div><br>
            <div>
                <label>Description : </label>
                <input type=\"text\" name=\"description\">
            </div><br>
            ";
        // line 41
        echo "            <div>
                <input id=\"hiddenIdUSer\" type=\"hidden\" name=\"id_user\" value=\"\">
            </div><br>
            <button type =\"submit\" class=\"btn btn-success\">Add This Task To The Current User</button>
        </form>
    </div>

    <p id=\"msgZoneAddTask\">
    </p><br>
    

    ";
        // line 53
        echo "    <p id=\"addUser\">
        <u>Add a user</u>
    </p><br>

    <div id=\"addUserZone\">
        <form id=\"formAddUser\" method=\"post\" action=\"\">
            <div>
                <label>Name : </label>
                <input type=\"text\" name=\"name\">
            </div><br>
            <div>
                <label>Email : </label>
                <input type=\"text\" name=\"email\">
            </div><br>
            <button type =\"submit\" class=\"btn btn-success\">Add This User</button>
        </form>
    </div>

    <p id=\"msgZoneAddUser\">
    </p>
    
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js\"></script>
    <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\" integrity=\"sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa\" crossorigin=\"anonymous\"></script>
    <script src=\"../web/script/scriptViewAllUsers.js\"></script>
    
";
        
        $__internal_50d1e086d15f0ef11c98b072a9fad1d451568234ee54efee4361fccfe48ba080->leave($__internal_50d1e086d15f0ef11c98b072a9fad1d451568234ee54efee4361fccfe48ba080_prof);

        
        $__internal_753785a0702a0069249095f62fca14a9720bc10c0be18460d53124b6641979ca->leave($__internal_753785a0702a0069249095f62fca14a9720bc10c0be18460d53124b6641979ca_prof);

    }

    public function getTemplateName()
    {
        return "index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 53,  91 => 41,  74 => 25,  59 => 11,  56 => 9,  54 => 8,  49 => 4,  40 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"layout.html.twig\" %}

{% block content %}
    
    <h1 id='colorWhite'>Welcome to my first API REST which aims at managing users and their tasks</h1><br>
    
    {# A cacher quand AJAX fini #}
    {# <a href=\"{{ path('view_all_users') }}\">Manage the users</a><br><br><br> #}
    
    {######## Voir tous les users et leurs tasks ####### #}
    <p id=\"viewAllUsers\">
        <u>View all users</u>
    </p>
        
    <div id=\"usersZone\">
        <ul>
        </ul>
    </div>

    <p id=\"msgZoneDeleteUser\">
    </p>
    
    <div id=\"tasksZone\">
        {# Tasks du user asked #}
    </div>

    <p id=\"msgZoneDeleteTask\">
    </p>
    
    <div id=\"addTaskZone\">
        <form id=\"formAddTask\" method=\"post\" action=\"\">
            <div>
                <label>Title : </label>
                <input type=\"text\" name=\"title\">
            </div><br>
            <div>
                <label>Description : </label>
                <input type=\"text\" name=\"description\">
            </div><br>
            {# On met l'id du user dans un champ caché #}
            <div>
                <input id=\"hiddenIdUSer\" type=\"hidden\" name=\"id_user\" value=\"\">
            </div><br>
            <button type =\"submit\" class=\"btn btn-success\">Add This Task To The Current User</button>
        </form>
    </div>

    <p id=\"msgZoneAddTask\">
    </p><br>
    

    {######## Ajouter un user ####### #}
    <p id=\"addUser\">
        <u>Add a user</u>
    </p><br>

    <div id=\"addUserZone\">
        <form id=\"formAddUser\" method=\"post\" action=\"\">
            <div>
                <label>Name : </label>
                <input type=\"text\" name=\"name\">
            </div><br>
            <div>
                <label>Email : </label>
                <input type=\"text\" name=\"email\">
            </div><br>
            <button type =\"submit\" class=\"btn btn-success\">Add This User</button>
        </form>
    </div>

    <p id=\"msgZoneAddUser\">
    </p>
    
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js\"></script>
    <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\" integrity=\"sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa\" crossorigin=\"anonymous\"></script>
    <script src=\"../web/script/scriptViewAllUsers.js\"></script>
    
{% endblock %}
", "index.html.twig", "C:\\wamp64\\www\\PORTFOLIO\\realisations\\05-mini-api-rest\\templates\\index.html.twig");
    }
}
