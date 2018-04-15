<?php

/* @WebProfiler/Collector/ajax.html.twig */
class __TwigTemplate_755630b4cfe8fcdee56c0e12e6c7071d6f53525aa26544a7e7dac9090aa60cfe extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/ajax.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_42aae4e2d3a43933b01f6951acdc04bf2bf754aca01a06c34503b3026db90933 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_42aae4e2d3a43933b01f6951acdc04bf2bf754aca01a06c34503b3026db90933->enter($__internal_42aae4e2d3a43933b01f6951acdc04bf2bf754aca01a06c34503b3026db90933_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/ajax.html.twig"));

        $__internal_3d834c64280b87204deded9430c0a4d7f5f277a1d13b478ee44d9068b5800351 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_3d834c64280b87204deded9430c0a4d7f5f277a1d13b478ee44d9068b5800351->enter($__internal_3d834c64280b87204deded9430c0a4d7f5f277a1d13b478ee44d9068b5800351_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/ajax.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_42aae4e2d3a43933b01f6951acdc04bf2bf754aca01a06c34503b3026db90933->leave($__internal_42aae4e2d3a43933b01f6951acdc04bf2bf754aca01a06c34503b3026db90933_prof);

        
        $__internal_3d834c64280b87204deded9430c0a4d7f5f277a1d13b478ee44d9068b5800351->leave($__internal_3d834c64280b87204deded9430c0a4d7f5f277a1d13b478ee44d9068b5800351_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_e25f48096a2410be2dd08bedf07f4092cf242311e973f6b28ba27a9e3a5d0906 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e25f48096a2410be2dd08bedf07f4092cf242311e973f6b28ba27a9e3a5d0906->enter($__internal_e25f48096a2410be2dd08bedf07f4092cf242311e973f6b28ba27a9e3a5d0906_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        $__internal_9ed9f7a50af1e8e0c38cb443cd5cd26f798b2842046b772f08bdc75e7db41362 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_9ed9f7a50af1e8e0c38cb443cd5cd26f798b2842046b772f08bdc75e7db41362->enter($__internal_9ed9f7a50af1e8e0c38cb443cd5cd26f798b2842046b772f08bdc75e7db41362_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        // line 4
        echo "    ";
        ob_start();
        // line 5
        echo "        ";
        echo twig_include($this->env, $context, "@WebProfiler/Icon/ajax.svg");
        echo "
        <span class=\"sf-toolbar-value sf-toolbar-ajax-request-counter\">0</span>
    ";
        $context["icon"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 8
        echo "
    ";
        // line 9
        $context["text"] = ('' === $tmp = "        <div class=\"sf-toolbar-info-piece\">
            <b class=\"sf-toolbar-ajax-info\"></b>
        </div>
        <div class=\"sf-toolbar-info-piece\">
            <table class=\"sf-toolbar-ajax-requests\">
                <thead>
                    <tr>
                        <th>Method</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>URL</th>
                        <th>Time</th>
                        <th>Profile</th>
                    </tr>
                </thead>
                <tbody class=\"sf-toolbar-ajax-request-list\"></tbody>
            </table>
        </div>
    ") ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 29
        echo "
    ";
        // line 30
        echo twig_include($this->env, $context, "@WebProfiler/Profiler/toolbar_item.html.twig", array("link" => false));
        echo "
";
        
        $__internal_9ed9f7a50af1e8e0c38cb443cd5cd26f798b2842046b772f08bdc75e7db41362->leave($__internal_9ed9f7a50af1e8e0c38cb443cd5cd26f798b2842046b772f08bdc75e7db41362_prof);

        
        $__internal_e25f48096a2410be2dd08bedf07f4092cf242311e973f6b28ba27a9e3a5d0906->leave($__internal_e25f48096a2410be2dd08bedf07f4092cf242311e973f6b28ba27a9e3a5d0906_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/ajax.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 30,  82 => 29,  62 => 9,  59 => 8,  52 => 5,  49 => 4,  40 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block toolbar %}
    {% set icon %}
        {{ include('@WebProfiler/Icon/ajax.svg') }}
        <span class=\"sf-toolbar-value sf-toolbar-ajax-request-counter\">0</span>
    {% endset %}

    {% set text %}
        <div class=\"sf-toolbar-info-piece\">
            <b class=\"sf-toolbar-ajax-info\"></b>
        </div>
        <div class=\"sf-toolbar-info-piece\">
            <table class=\"sf-toolbar-ajax-requests\">
                <thead>
                    <tr>
                        <th>Method</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>URL</th>
                        <th>Time</th>
                        <th>Profile</th>
                    </tr>
                </thead>
                <tbody class=\"sf-toolbar-ajax-request-list\"></tbody>
            </table>
        </div>
    {% endset %}

    {{ include('@WebProfiler/Profiler/toolbar_item.html.twig', { link: false }) }}
{% endblock %}
", "@WebProfiler/Collector/ajax.html.twig", "C:\\wamp64\\www\\PORTFOLIO\\realisations\\05-mini-api-rest\\vendor\\symfony\\web-profiler-bundle\\Resources\\views\\Collector\\ajax.html.twig");
    }
}
