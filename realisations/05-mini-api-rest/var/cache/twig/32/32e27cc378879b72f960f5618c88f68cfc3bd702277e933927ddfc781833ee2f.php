<?php

/* layout.html.twig */
class __TwigTemplate_99fb1f6b1ac143f3c4d7b1a75d4e505b78b7dddecf3dd083a848f34bc860eec2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_1d64b5e7d65ac8516f637cd7f65ad2e8c900145e2ae0772af1120ffc880894a6 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_1d64b5e7d65ac8516f637cd7f65ad2e8c900145e2ae0772af1120ffc880894a6->enter($__internal_1d64b5e7d65ac8516f637cd7f65ad2e8c900145e2ae0772af1120ffc880894a6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "layout.html.twig"));

        $__internal_d155dc7343c934bab7cf813d111548d5f6f96cc3093b4fb5592612fadaa988c3 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_d155dc7343c934bab7cf813d111548d5f6f96cc3093b4fb5592612fadaa988c3->enter($__internal_d155dc7343c934bab7cf813d111548d5f6f96cc3093b4fb5592612fadaa988c3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "layout.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <title>";
        // line 4
        $this->displayBlock('title', $context, $blocks);
        echo " - My First API REST</title>

        <link href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/main.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
        <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\" integrity=\"sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u\" crossorigin=\"anonymous\"> 

        <script type=\"text/javascript\">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
        </script>
    </head>
    <body>
        ";
        // line 22
        $this->displayBlock('content', $context, $blocks);
        // line 23
        echo "    </body>
</html>
";
        
        $__internal_1d64b5e7d65ac8516f637cd7f65ad2e8c900145e2ae0772af1120ffc880894a6->leave($__internal_1d64b5e7d65ac8516f637cd7f65ad2e8c900145e2ae0772af1120ffc880894a6_prof);

        
        $__internal_d155dc7343c934bab7cf813d111548d5f6f96cc3093b4fb5592612fadaa988c3->leave($__internal_d155dc7343c934bab7cf813d111548d5f6f96cc3093b4fb5592612fadaa988c3_prof);

    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        $__internal_eba3645644fb43874024761dabf59d35a5eb7e4e89fb0e35a7ce7f2e0a7b7b15 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_eba3645644fb43874024761dabf59d35a5eb7e4e89fb0e35a7ce7f2e0a7b7b15->enter($__internal_eba3645644fb43874024761dabf59d35a5eb7e4e89fb0e35a7ce7f2e0a7b7b15_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_01ca3c0b04d10307035469c8b0a50db1028cbcf149c53a824e36c9275eefd7c2 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_01ca3c0b04d10307035469c8b0a50db1028cbcf149c53a824e36c9275eefd7c2->enter($__internal_01ca3c0b04d10307035469c8b0a50db1028cbcf149c53a824e36c9275eefd7c2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "";
        
        $__internal_01ca3c0b04d10307035469c8b0a50db1028cbcf149c53a824e36c9275eefd7c2->leave($__internal_01ca3c0b04d10307035469c8b0a50db1028cbcf149c53a824e36c9275eefd7c2_prof);

        
        $__internal_eba3645644fb43874024761dabf59d35a5eb7e4e89fb0e35a7ce7f2e0a7b7b15->leave($__internal_eba3645644fb43874024761dabf59d35a5eb7e4e89fb0e35a7ce7f2e0a7b7b15_prof);

    }

    // line 22
    public function block_content($context, array $blocks = array())
    {
        $__internal_42d6e07a022e07177041b0c036e0610ac6ec419b3a6af4519b857c4fa4d4c952 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_42d6e07a022e07177041b0c036e0610ac6ec419b3a6af4519b857c4fa4d4c952->enter($__internal_42d6e07a022e07177041b0c036e0610ac6ec419b3a6af4519b857c4fa4d4c952_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_c67b856813033e012e1ad6111b74ca911e1056782c65f74bb471493bf5c47d0c = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_c67b856813033e012e1ad6111b74ca911e1056782c65f74bb471493bf5c47d0c->enter($__internal_c67b856813033e012e1ad6111b74ca911e1056782c65f74bb471493bf5c47d0c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        
        $__internal_c67b856813033e012e1ad6111b74ca911e1056782c65f74bb471493bf5c47d0c->leave($__internal_c67b856813033e012e1ad6111b74ca911e1056782c65f74bb471493bf5c47d0c_prof);

        
        $__internal_42d6e07a022e07177041b0c036e0610ac6ec419b3a6af4519b857c4fa4d4c952->leave($__internal_42d6e07a022e07177041b0c036e0610ac6ec419b3a6af4519b857c4fa4d4c952_prof);

    }

    public function getTemplateName()
    {
        return "layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 22,  70 => 4,  58 => 23,  56 => 22,  37 => 6,  32 => 4,  27 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
    <head>
        <title>{% block title '' %} - My First API REST</title>

        <link href=\"{{ asset('css/main.css') }}\" rel=\"stylesheet\" type=\"text/css\" />
        <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\" integrity=\"sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u\" crossorigin=\"anonymous\"> 

        <script type=\"text/javascript\">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
        </script>
    </head>
    <body>
        {% block content %}{% endblock %}
    </body>
</html>
", "layout.html.twig", "C:\\wamp64\\www\\PORTFOLIO\\realisations\\05-mini-api-rest\\templates\\layout.html.twig");
    }
}
