<?php

/* @WebProfiler/Collector/exception.html.twig */
class __TwigTemplate_cb1a96e917710aa1a2ec996212f6b8a20f525bef4701d865ebdf4a7b62834c82 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/exception.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_28caabbdc098f1746f1ff8cbc311847dfe6c605553ab04de57f91893b09d6571 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_28caabbdc098f1746f1ff8cbc311847dfe6c605553ab04de57f91893b09d6571->enter($__internal_28caabbdc098f1746f1ff8cbc311847dfe6c605553ab04de57f91893b09d6571_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/exception.html.twig"));

        $__internal_4807f440c9dc8e5c279e944a63a75b145cf8b72bcedcd62277d70321fadcf56e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_4807f440c9dc8e5c279e944a63a75b145cf8b72bcedcd62277d70321fadcf56e->enter($__internal_4807f440c9dc8e5c279e944a63a75b145cf8b72bcedcd62277d70321fadcf56e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/exception.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_28caabbdc098f1746f1ff8cbc311847dfe6c605553ab04de57f91893b09d6571->leave($__internal_28caabbdc098f1746f1ff8cbc311847dfe6c605553ab04de57f91893b09d6571_prof);

        
        $__internal_4807f440c9dc8e5c279e944a63a75b145cf8b72bcedcd62277d70321fadcf56e->leave($__internal_4807f440c9dc8e5c279e944a63a75b145cf8b72bcedcd62277d70321fadcf56e_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_948270894bbe5014182d5ae47081ac7356b6016a6a725e0c152cd686d14ff1cc = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_948270894bbe5014182d5ae47081ac7356b6016a6a725e0c152cd686d14ff1cc->enter($__internal_948270894bbe5014182d5ae47081ac7356b6016a6a725e0c152cd686d14ff1cc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        $__internal_949180f0a5466b1ef5a6691abcdf149cf3de730d73708a1208aca7f31dcad2ee = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_949180f0a5466b1ef5a6691abcdf149cf3de730d73708a1208aca7f31dcad2ee->enter($__internal_949180f0a5466b1ef5a6691abcdf149cf3de730d73708a1208aca7f31dcad2ee_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    ";
        if ($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "hasexception", array())) {
            // line 5
            echo "        <style>
            ";
            // line 6
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_exception_css", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
            echo "
        </style>
    ";
        }
        // line 9
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
";
        
        $__internal_949180f0a5466b1ef5a6691abcdf149cf3de730d73708a1208aca7f31dcad2ee->leave($__internal_949180f0a5466b1ef5a6691abcdf149cf3de730d73708a1208aca7f31dcad2ee_prof);

        
        $__internal_948270894bbe5014182d5ae47081ac7356b6016a6a725e0c152cd686d14ff1cc->leave($__internal_948270894bbe5014182d5ae47081ac7356b6016a6a725e0c152cd686d14ff1cc_prof);

    }

    // line 12
    public function block_menu($context, array $blocks = array())
    {
        $__internal_a20d255d77b34918ef1445289b11ac17925d14563a67232b05eb394fb2c2191f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a20d255d77b34918ef1445289b11ac17925d14563a67232b05eb394fb2c2191f->enter($__internal_a20d255d77b34918ef1445289b11ac17925d14563a67232b05eb394fb2c2191f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        $__internal_ec83d40230de48a4b8e21ae28046beea7f5687e740ac863c52adc72545a4333b = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_ec83d40230de48a4b8e21ae28046beea7f5687e740ac863c52adc72545a4333b->enter($__internal_ec83d40230de48a4b8e21ae28046beea7f5687e740ac863c52adc72545a4333b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 13
        echo "    <span class=\"label ";
        echo (($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "hasexception", array())) ? ("label-status-error") : ("disabled"));
        echo "\">
        <span class=\"icon\">";
        // line 14
        echo twig_include($this->env, $context, "@WebProfiler/Icon/exception.svg");
        echo "</span>
        <strong>Exception</strong>
        ";
        // line 16
        if ($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "hasexception", array())) {
            // line 17
            echo "            <span class=\"count\">
                <span>1</span>
            </span>
        ";
        }
        // line 21
        echo "    </span>
";
        
        $__internal_ec83d40230de48a4b8e21ae28046beea7f5687e740ac863c52adc72545a4333b->leave($__internal_ec83d40230de48a4b8e21ae28046beea7f5687e740ac863c52adc72545a4333b_prof);

        
        $__internal_a20d255d77b34918ef1445289b11ac17925d14563a67232b05eb394fb2c2191f->leave($__internal_a20d255d77b34918ef1445289b11ac17925d14563a67232b05eb394fb2c2191f_prof);

    }

    // line 24
    public function block_panel($context, array $blocks = array())
    {
        $__internal_4b457ddbdc1bc5b1373a40b3bb7d7547dbdce7fb65d2aa2619081d4d6a76f005 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_4b457ddbdc1bc5b1373a40b3bb7d7547dbdce7fb65d2aa2619081d4d6a76f005->enter($__internal_4b457ddbdc1bc5b1373a40b3bb7d7547dbdce7fb65d2aa2619081d4d6a76f005_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_24f457d3d9138f8f2d63e323bb6b707432a5b1128d74cd858890833a8c78e1d5 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_24f457d3d9138f8f2d63e323bb6b707432a5b1128d74cd858890833a8c78e1d5->enter($__internal_24f457d3d9138f8f2d63e323bb6b707432a5b1128d74cd858890833a8c78e1d5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 25
        echo "    <h2>Exceptions</h2>

    ";
        // line 27
        if ( !$this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "hasexception", array())) {
            // line 28
            echo "        <div class=\"empty\">
            <p>No exception was thrown and caught during the request.</p>
        </div>
    ";
        } else {
            // line 32
            echo "        <div class=\"sf-reset\">
            ";
            // line 33
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_exception", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
            echo "
        </div>
    ";
        }
        
        $__internal_24f457d3d9138f8f2d63e323bb6b707432a5b1128d74cd858890833a8c78e1d5->leave($__internal_24f457d3d9138f8f2d63e323bb6b707432a5b1128d74cd858890833a8c78e1d5_prof);

        
        $__internal_4b457ddbdc1bc5b1373a40b3bb7d7547dbdce7fb65d2aa2619081d4d6a76f005->leave($__internal_4b457ddbdc1bc5b1373a40b3bb7d7547dbdce7fb65d2aa2619081d4d6a76f005_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/exception.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 33,  135 => 32,  129 => 28,  127 => 27,  123 => 25,  114 => 24,  103 => 21,  97 => 17,  95 => 16,  90 => 14,  85 => 13,  76 => 12,  63 => 9,  57 => 6,  54 => 5,  51 => 4,  42 => 3,  11 => 1,);
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

{% block head %}
    {% if collector.hasexception %}
        <style>
            {{ render(path('_profiler_exception_css', { token: token })) }}
        </style>
    {% endif %}
    {{ parent() }}
{% endblock %}

{% block menu %}
    <span class=\"label {{ collector.hasexception ? 'label-status-error' : 'disabled' }}\">
        <span class=\"icon\">{{ include('@WebProfiler/Icon/exception.svg') }}</span>
        <strong>Exception</strong>
        {% if collector.hasexception %}
            <span class=\"count\">
                <span>1</span>
            </span>
        {% endif %}
    </span>
{% endblock %}

{% block panel %}
    <h2>Exceptions</h2>

    {% if not collector.hasexception %}
        <div class=\"empty\">
            <p>No exception was thrown and caught during the request.</p>
        </div>
    {% else %}
        <div class=\"sf-reset\">
            {{ render(path('_profiler_exception', { token: token })) }}
        </div>
    {% endif %}
{% endblock %}
", "@WebProfiler/Collector/exception.html.twig", "C:\\wamp64\\www\\PORTFOLIO\\realisations\\05-mini-api-rest\\vendor\\symfony\\web-profiler-bundle\\Resources\\views\\Collector\\exception.html.twig");
    }
}
