<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_bc7e0f469828bcdb525470aff076bbb72b5370adf3a1d246c24c6b8f8ed03f63 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
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
        $__internal_a411f081a29247f4903953e1ce29d1b625df1d69dfc64846e94fcd28b0e83a12 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a411f081a29247f4903953e1ce29d1b625df1d69dfc64846e94fcd28b0e83a12->enter($__internal_a411f081a29247f4903953e1ce29d1b625df1d69dfc64846e94fcd28b0e83a12_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $__internal_57a5734dfcb81e3d0d2494c0958043028aa2ca8dfeb59e42c641d46d445f1f3d = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_57a5734dfcb81e3d0d2494c0958043028aa2ca8dfeb59e42c641d46d445f1f3d->enter($__internal_57a5734dfcb81e3d0d2494c0958043028aa2ca8dfeb59e42c641d46d445f1f3d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_a411f081a29247f4903953e1ce29d1b625df1d69dfc64846e94fcd28b0e83a12->leave($__internal_a411f081a29247f4903953e1ce29d1b625df1d69dfc64846e94fcd28b0e83a12_prof);

        
        $__internal_57a5734dfcb81e3d0d2494c0958043028aa2ca8dfeb59e42c641d46d445f1f3d->leave($__internal_57a5734dfcb81e3d0d2494c0958043028aa2ca8dfeb59e42c641d46d445f1f3d_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_65a3dcba1d0949abb2be8534a54c11c86e143b21e8a666f712ca8cd3248203c0 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_65a3dcba1d0949abb2be8534a54c11c86e143b21e8a666f712ca8cd3248203c0->enter($__internal_65a3dcba1d0949abb2be8534a54c11c86e143b21e8a666f712ca8cd3248203c0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        $__internal_96467b9751b7bdbdb50a8297f2bf21ca50aaf8ca5d9dd62c2a79a25413da2daa = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_96467b9751b7bdbdb50a8297f2bf21ca50aaf8ca5d9dd62c2a79a25413da2daa->enter($__internal_96467b9751b7bdbdb50a8297f2bf21ca50aaf8ca5d9dd62c2a79a25413da2daa_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_96467b9751b7bdbdb50a8297f2bf21ca50aaf8ca5d9dd62c2a79a25413da2daa->leave($__internal_96467b9751b7bdbdb50a8297f2bf21ca50aaf8ca5d9dd62c2a79a25413da2daa_prof);

        
        $__internal_65a3dcba1d0949abb2be8534a54c11c86e143b21e8a666f712ca8cd3248203c0->leave($__internal_65a3dcba1d0949abb2be8534a54c11c86e143b21e8a666f712ca8cd3248203c0_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_3db9a3fa4fb8128dc8a16d28ed654bc30a5075dc55e4adf4615079ae71f7dbcd = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_3db9a3fa4fb8128dc8a16d28ed654bc30a5075dc55e4adf4615079ae71f7dbcd->enter($__internal_3db9a3fa4fb8128dc8a16d28ed654bc30a5075dc55e4adf4615079ae71f7dbcd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        $__internal_922cb0bfea2092037bb5c114809bbb1694f333e2a1e80775f3bff332c95aaab7 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_922cb0bfea2092037bb5c114809bbb1694f333e2a1e80775f3bff332c95aaab7->enter($__internal_922cb0bfea2092037bb5c114809bbb1694f333e2a1e80775f3bff332c95aaab7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_922cb0bfea2092037bb5c114809bbb1694f333e2a1e80775f3bff332c95aaab7->leave($__internal_922cb0bfea2092037bb5c114809bbb1694f333e2a1e80775f3bff332c95aaab7_prof);

        
        $__internal_3db9a3fa4fb8128dc8a16d28ed654bc30a5075dc55e4adf4615079ae71f7dbcd->leave($__internal_3db9a3fa4fb8128dc8a16d28ed654bc30a5075dc55e4adf4615079ae71f7dbcd_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_3b1f45e64d69abcc24c5e2abef2ed0ec54eace701a325ddd203d6672e6a68352 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_3b1f45e64d69abcc24c5e2abef2ed0ec54eace701a325ddd203d6672e6a68352->enter($__internal_3b1f45e64d69abcc24c5e2abef2ed0ec54eace701a325ddd203d6672e6a68352_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_5f7d5595204a74c452fb6c82952f4f1defa6ab8331e5792073247801a0a9b25f = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_5f7d5595204a74c452fb6c82952f4f1defa6ab8331e5792073247801a0a9b25f->enter($__internal_5f7d5595204a74c452fb6c82952f4f1defa6ab8331e5792073247801a0a9b25f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_5f7d5595204a74c452fb6c82952f4f1defa6ab8331e5792073247801a0a9b25f->leave($__internal_5f7d5595204a74c452fb6c82952f4f1defa6ab8331e5792073247801a0a9b25f_prof);

        
        $__internal_3b1f45e64d69abcc24c5e2abef2ed0ec54eace701a325ddd203d6672e6a68352->leave($__internal_3b1f45e64d69abcc24c5e2abef2ed0ec54eace701a325ddd203d6672e6a68352_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 13,  85 => 12,  71 => 7,  68 => 6,  59 => 5,  42 => 3,  11 => 1,);
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

{% block toolbar %}{% endblock %}

{% block menu %}
<span class=\"label\">
    <span class=\"icon\">{{ include('@WebProfiler/Icon/router.svg') }}</span>
    <strong>Routing</strong>
</span>
{% endblock %}

{% block panel %}
    {{ render(path('_profiler_router', { token: token })) }}
{% endblock %}
", "@WebProfiler/Collector/router.html.twig", "C:\\wamp64\\www\\PORTFOLIO\\realisations\\05-mini-api-rest\\vendor\\symfony\\web-profiler-bundle\\Resources\\views\\Collector\\router.html.twig");
    }
}
