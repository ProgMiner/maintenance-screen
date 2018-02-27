
window.projectVersion = 'twig-splitting';

(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:MaintenanceScreen" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="MaintenanceScreen.html">MaintenanceScreen</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:MaintenanceScreen_Configurations" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="MaintenanceScreen/Configurations.html">Configurations</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:MaintenanceScreen_Configurations_MainConfiguration" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="MaintenanceScreen/Configurations/MainConfiguration.html">MainConfiguration</a>                    </div>                </li>                            <li data-name="class:MaintenanceScreen_Configurations_TranslatorConfiguration" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="MaintenanceScreen/Configurations/TranslatorConfiguration.html">TranslatorConfiguration</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:MaintenanceScreen_FileLoader" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="MaintenanceScreen/FileLoader.html">FileLoader</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:MaintenanceScreen_FileLoader_YamlFileLoader" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="MaintenanceScreen/FileLoader/YamlFileLoader.html">YamlFileLoader</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:MaintenanceScreen_TemplateRenderer" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="MaintenanceScreen/TemplateRenderer.html">TemplateRenderer</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:MaintenanceScreen_TemplateRenderer_CallableTemplateRenderer" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="MaintenanceScreen/TemplateRenderer/CallableTemplateRenderer.html">CallableTemplateRenderer</a>                    </div>                </li>                            <li data-name="class:MaintenanceScreen_TemplateRenderer_PhpTemplateRenderer" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="MaintenanceScreen/TemplateRenderer/PhpTemplateRenderer.html">PhpTemplateRenderer</a>                    </div>                </li>                            <li data-name="class:MaintenanceScreen_TemplateRenderer_TemplateRendererInterface" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="MaintenanceScreen/TemplateRenderer/TemplateRendererInterface.html">TemplateRendererInterface</a>                    </div>                </li>                            <li data-name="class:MaintenanceScreen_TemplateRenderer_TwigTemplateRenderer" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="MaintenanceScreen/TemplateRenderer/TwigTemplateRenderer.html">TwigTemplateRenderer</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:MaintenanceScreen_TranslatorProvider" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="MaintenanceScreen/TranslatorProvider.html">TranslatorProvider</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:MaintenanceScreen_TranslatorProvider_ArrayTranslatorProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="MaintenanceScreen/TranslatorProvider/ArrayTranslatorProvider.html">ArrayTranslatorProvider</a>                    </div>                </li>                            <li data-name="class:MaintenanceScreen_TranslatorProvider_FilesystemTranslatorProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="MaintenanceScreen/TranslatorProvider/FilesystemTranslatorProvider.html">FilesystemTranslatorProvider</a>                    </div>                </li>                            <li data-name="class:MaintenanceScreen_TranslatorProvider_TranslatorProviderInterface" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="MaintenanceScreen/TranslatorProvider/TranslatorProviderInterface.html">TranslatorProviderInterface</a>                    </div>                </li>                            <li data-name="class:MaintenanceScreen_TranslatorProvider_TranslatorProviderTrait" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="MaintenanceScreen/TranslatorProvider/TranslatorProviderTrait.html">TranslatorProviderTrait</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:MaintenanceScreen_ConfigurationLoader" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="MaintenanceScreen/ConfigurationLoader.html">ConfigurationLoader</a>                    </div>                </li>                            <li data-name="class:MaintenanceScreen_MaintenanceScreen" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="MaintenanceScreen/MaintenanceScreen.html">MaintenanceScreen</a>                    </div>                </li>                            <li data-name="class:MaintenanceScreen_Translator" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="MaintenanceScreen/Translator.html">Translator</a>                    </div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "MaintenanceScreen.html", "name": "MaintenanceScreen", "doc": "Namespace MaintenanceScreen"},{"type": "Namespace", "link": "MaintenanceScreen/Configurations.html", "name": "MaintenanceScreen\\Configurations", "doc": "Namespace MaintenanceScreen\\Configurations"},{"type": "Namespace", "link": "MaintenanceScreen/FileLoader.html", "name": "MaintenanceScreen\\FileLoader", "doc": "Namespace MaintenanceScreen\\FileLoader"},{"type": "Namespace", "link": "MaintenanceScreen/TemplateRenderer.html", "name": "MaintenanceScreen\\TemplateRenderer", "doc": "Namespace MaintenanceScreen\\TemplateRenderer"},{"type": "Namespace", "link": "MaintenanceScreen/TranslatorProvider.html", "name": "MaintenanceScreen\\TranslatorProvider", "doc": "Namespace MaintenanceScreen\\TranslatorProvider"},
            {"type": "Interface", "fromName": "MaintenanceScreen\\TemplateRenderer", "fromLink": "MaintenanceScreen/TemplateRenderer.html", "link": "MaintenanceScreen/TemplateRenderer/TemplateRendererInterface.html", "name": "MaintenanceScreen\\TemplateRenderer\\TemplateRendererInterface", "doc": "&quot;Interface for different template engines&quot;"},
                                                        {"type": "Method", "fromName": "MaintenanceScreen\\TemplateRenderer\\TemplateRendererInterface", "fromLink": "MaintenanceScreen/TemplateRenderer/TemplateRendererInterface.html", "link": "MaintenanceScreen/TemplateRenderer/TemplateRendererInterface.html#method_render", "name": "MaintenanceScreen\\TemplateRenderer\\TemplateRendererInterface::render", "doc": "&quot;Renders template by name and provides variables to them&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\TemplateRenderer\\TemplateRendererInterface", "fromLink": "MaintenanceScreen/TemplateRenderer/TemplateRendererInterface.html", "link": "MaintenanceScreen/TemplateRenderer/TemplateRendererInterface.html#method_supports", "name": "MaintenanceScreen\\TemplateRenderer\\TemplateRendererInterface::supports", "doc": "&quot;Returns whether this renderer supports the template&quot;"},
            
            {"type": "Interface", "fromName": "MaintenanceScreen\\TranslatorProvider", "fromLink": "MaintenanceScreen/TranslatorProvider.html", "link": "MaintenanceScreen/TranslatorProvider/TranslatorProviderInterface.html", "name": "MaintenanceScreen\\TranslatorProvider\\TranslatorProviderInterface", "doc": "&quot;Interface for Translator instances providers&quot;"},
                                                        {"type": "Method", "fromName": "MaintenanceScreen\\TranslatorProvider\\TranslatorProviderInterface", "fromLink": "MaintenanceScreen/TranslatorProvider/TranslatorProviderInterface.html", "link": "MaintenanceScreen/TranslatorProvider/TranslatorProviderInterface.html#method_getTranslator", "name": "MaintenanceScreen\\TranslatorProvider\\TranslatorProviderInterface::getTranslator", "doc": "&quot;Makes Translator for language&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\TranslatorProvider\\TranslatorProviderInterface", "fromLink": "MaintenanceScreen/TranslatorProvider/TranslatorProviderInterface.html", "link": "MaintenanceScreen/TranslatorProvider/TranslatorProviderInterface.html#method_getPreferredTranslator", "name": "MaintenanceScreen\\TranslatorProvider\\TranslatorProviderInterface::getPreferredTranslator", "doc": "&quot;Makes Translator for preferred language&quot;"},
            
            
            {"type": "Class", "fromName": "MaintenanceScreen", "fromLink": "MaintenanceScreen.html", "link": "MaintenanceScreen/ConfigurationLoader.html", "name": "MaintenanceScreen\\ConfigurationLoader", "doc": "&quot;Configuraion loader&quot;"},
                                                        {"type": "Method", "fromName": "MaintenanceScreen\\ConfigurationLoader", "fromLink": "MaintenanceScreen/ConfigurationLoader.html", "link": "MaintenanceScreen/ConfigurationLoader.html#method___construct", "name": "MaintenanceScreen\\ConfigurationLoader::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\ConfigurationLoader", "fromLink": "MaintenanceScreen/ConfigurationLoader.html", "link": "MaintenanceScreen/ConfigurationLoader.html#method_loadFile", "name": "MaintenanceScreen\\ConfigurationLoader::loadFile", "doc": "&quot;Loads config file by name&quot;"},
            
            {"type": "Class", "fromName": "MaintenanceScreen\\Configurations", "fromLink": "MaintenanceScreen/Configurations.html", "link": "MaintenanceScreen/Configurations/MainConfiguration.html", "name": "MaintenanceScreen\\Configurations\\MainConfiguration", "doc": "&quot;ConfigurationInterface implementation for main configuration&quot;"},
                                                        {"type": "Method", "fromName": "MaintenanceScreen\\Configurations\\MainConfiguration", "fromLink": "MaintenanceScreen/Configurations/MainConfiguration.html", "link": "MaintenanceScreen/Configurations/MainConfiguration.html#method_getConfigTreeBuilder", "name": "MaintenanceScreen\\Configurations\\MainConfiguration::getConfigTreeBuilder", "doc": "&quot;{@inheritdoc}&quot;"},
            
            {"type": "Class", "fromName": "MaintenanceScreen\\Configurations", "fromLink": "MaintenanceScreen/Configurations.html", "link": "MaintenanceScreen/Configurations/TranslatorConfiguration.html", "name": "MaintenanceScreen\\Configurations\\TranslatorConfiguration", "doc": "&quot;ConfigurationInterface implementation for translations\n!ONLY FOR FILES!&quot;"},
                                                        {"type": "Method", "fromName": "MaintenanceScreen\\Configurations\\TranslatorConfiguration", "fromLink": "MaintenanceScreen/Configurations/TranslatorConfiguration.html", "link": "MaintenanceScreen/Configurations/TranslatorConfiguration.html#method_getConfigTreeBuilder", "name": "MaintenanceScreen\\Configurations\\TranslatorConfiguration::getConfigTreeBuilder", "doc": "&quot;{@inheritdoc}&quot;"},
            
            {"type": "Class", "fromName": "MaintenanceScreen\\FileLoader", "fromLink": "MaintenanceScreen/FileLoader.html", "link": "MaintenanceScreen/FileLoader/YamlFileLoader.html", "name": "MaintenanceScreen\\FileLoader\\YamlFileLoader", "doc": "&quot;Yaml configuration loader&quot;"},
                                                        {"type": "Method", "fromName": "MaintenanceScreen\\FileLoader\\YamlFileLoader", "fromLink": "MaintenanceScreen/FileLoader/YamlFileLoader.html", "link": "MaintenanceScreen/FileLoader/YamlFileLoader.html#method_load", "name": "MaintenanceScreen\\FileLoader\\YamlFileLoader::load", "doc": "&quot;{@inheritdoc}&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\FileLoader\\YamlFileLoader", "fromLink": "MaintenanceScreen/FileLoader/YamlFileLoader.html", "link": "MaintenanceScreen/FileLoader/YamlFileLoader.html#method_supports", "name": "MaintenanceScreen\\FileLoader\\YamlFileLoader::supports", "doc": "&quot;{@inheritdoc}&quot;"},
            
            {"type": "Class", "fromName": "MaintenanceScreen", "fromLink": "MaintenanceScreen.html", "link": "MaintenanceScreen/MaintenanceScreen.html", "name": "MaintenanceScreen\\MaintenanceScreen", "doc": "&quot;Main class&quot;"},
                                                        {"type": "Method", "fromName": "MaintenanceScreen\\MaintenanceScreen", "fromLink": "MaintenanceScreen/MaintenanceScreen.html", "link": "MaintenanceScreen/MaintenanceScreen.html#method___construct", "name": "MaintenanceScreen\\MaintenanceScreen::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\MaintenanceScreen", "fromLink": "MaintenanceScreen/MaintenanceScreen.html", "link": "MaintenanceScreen/MaintenanceScreen.html#method_render", "name": "MaintenanceScreen\\MaintenanceScreen::render", "doc": "&quot;Renders maintenance screen for Request to Response&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\MaintenanceScreen", "fromLink": "MaintenanceScreen/MaintenanceScreen.html", "link": "MaintenanceScreen/MaintenanceScreen.html#method_send", "name": "MaintenanceScreen\\MaintenanceScreen::send", "doc": "&quot;Renders and sends maintenance screen for Request&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\MaintenanceScreen", "fromLink": "MaintenanceScreen/MaintenanceScreen.html", "link": "MaintenanceScreen/MaintenanceScreen.html#method_fromConfigFile", "name": "MaintenanceScreen\\MaintenanceScreen::fromConfigFile", "doc": "&quot;Makes MaintenanceScreen instance from config file&quot;"},
            
            {"type": "Class", "fromName": "MaintenanceScreen\\TemplateRenderer", "fromLink": "MaintenanceScreen/TemplateRenderer.html", "link": "MaintenanceScreen/TemplateRenderer/CallableTemplateRenderer.html", "name": "MaintenanceScreen\\TemplateRenderer\\CallableTemplateRenderer", "doc": "&quot;Template renderer for callable templates&quot;"},
                                                        {"type": "Method", "fromName": "MaintenanceScreen\\TemplateRenderer\\CallableTemplateRenderer", "fromLink": "MaintenanceScreen/TemplateRenderer/CallableTemplateRenderer.html", "link": "MaintenanceScreen/TemplateRenderer/CallableTemplateRenderer.html#method___construct", "name": "MaintenanceScreen\\TemplateRenderer\\CallableTemplateRenderer::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\TemplateRenderer\\CallableTemplateRenderer", "fromLink": "MaintenanceScreen/TemplateRenderer/CallableTemplateRenderer.html", "link": "MaintenanceScreen/TemplateRenderer/CallableTemplateRenderer.html#method_render", "name": "MaintenanceScreen\\TemplateRenderer\\CallableTemplateRenderer::render", "doc": "&quot;Renders template by name and provides variables to them&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\TemplateRenderer\\CallableTemplateRenderer", "fromLink": "MaintenanceScreen/TemplateRenderer/CallableTemplateRenderer.html", "link": "MaintenanceScreen/TemplateRenderer/CallableTemplateRenderer.html#method_supports", "name": "MaintenanceScreen\\TemplateRenderer\\CallableTemplateRenderer::supports", "doc": "&quot;Returns whether this renderer supports the template&quot;"},
            
            {"type": "Class", "fromName": "MaintenanceScreen\\TemplateRenderer", "fromLink": "MaintenanceScreen/TemplateRenderer.html", "link": "MaintenanceScreen/TemplateRenderer/PhpTemplateRenderer.html", "name": "MaintenanceScreen\\TemplateRenderer\\PhpTemplateRenderer", "doc": "&quot;Template renderer for PHP templates&quot;"},
                                                        {"type": "Method", "fromName": "MaintenanceScreen\\TemplateRenderer\\PhpTemplateRenderer", "fromLink": "MaintenanceScreen/TemplateRenderer/PhpTemplateRenderer.html", "link": "MaintenanceScreen/TemplateRenderer/PhpTemplateRenderer.html#method___construct", "name": "MaintenanceScreen\\TemplateRenderer\\PhpTemplateRenderer::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\TemplateRenderer\\PhpTemplateRenderer", "fromLink": "MaintenanceScreen/TemplateRenderer/PhpTemplateRenderer.html", "link": "MaintenanceScreen/TemplateRenderer/PhpTemplateRenderer.html#method_render", "name": "MaintenanceScreen\\TemplateRenderer\\PhpTemplateRenderer::render", "doc": "&quot;Renders template by name and provides variables to them&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\TemplateRenderer\\PhpTemplateRenderer", "fromLink": "MaintenanceScreen/TemplateRenderer/PhpTemplateRenderer.html", "link": "MaintenanceScreen/TemplateRenderer/PhpTemplateRenderer.html#method_supports", "name": "MaintenanceScreen\\TemplateRenderer\\PhpTemplateRenderer::supports", "doc": "&quot;Returns whether this renderer supports the template&quot;"},
            
            {"type": "Class", "fromName": "MaintenanceScreen\\TemplateRenderer", "fromLink": "MaintenanceScreen/TemplateRenderer.html", "link": "MaintenanceScreen/TemplateRenderer/TemplateRendererInterface.html", "name": "MaintenanceScreen\\TemplateRenderer\\TemplateRendererInterface", "doc": "&quot;Interface for different template engines&quot;"},
                                                        {"type": "Method", "fromName": "MaintenanceScreen\\TemplateRenderer\\TemplateRendererInterface", "fromLink": "MaintenanceScreen/TemplateRenderer/TemplateRendererInterface.html", "link": "MaintenanceScreen/TemplateRenderer/TemplateRendererInterface.html#method_render", "name": "MaintenanceScreen\\TemplateRenderer\\TemplateRendererInterface::render", "doc": "&quot;Renders template by name and provides variables to them&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\TemplateRenderer\\TemplateRendererInterface", "fromLink": "MaintenanceScreen/TemplateRenderer/TemplateRendererInterface.html", "link": "MaintenanceScreen/TemplateRenderer/TemplateRendererInterface.html#method_supports", "name": "MaintenanceScreen\\TemplateRenderer\\TemplateRendererInterface::supports", "doc": "&quot;Returns whether this renderer supports the template&quot;"},
            
            {"type": "Class", "fromName": "MaintenanceScreen\\TemplateRenderer", "fromLink": "MaintenanceScreen/TemplateRenderer.html", "link": "MaintenanceScreen/TemplateRenderer/TwigTemplateRenderer.html", "name": "MaintenanceScreen\\TemplateRenderer\\TwigTemplateRenderer", "doc": "&quot;Template renderer for Twig templates&quot;"},
                                                        {"type": "Method", "fromName": "MaintenanceScreen\\TemplateRenderer\\TwigTemplateRenderer", "fromLink": "MaintenanceScreen/TemplateRenderer/TwigTemplateRenderer.html", "link": "MaintenanceScreen/TemplateRenderer/TwigTemplateRenderer.html#method___construct", "name": "MaintenanceScreen\\TemplateRenderer\\TwigTemplateRenderer::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\TemplateRenderer\\TwigTemplateRenderer", "fromLink": "MaintenanceScreen/TemplateRenderer/TwigTemplateRenderer.html", "link": "MaintenanceScreen/TemplateRenderer/TwigTemplateRenderer.html#method_render", "name": "MaintenanceScreen\\TemplateRenderer\\TwigTemplateRenderer::render", "doc": "&quot;Renders template by name and provides variables to them&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\TemplateRenderer\\TwigTemplateRenderer", "fromLink": "MaintenanceScreen/TemplateRenderer/TwigTemplateRenderer.html", "link": "MaintenanceScreen/TemplateRenderer/TwigTemplateRenderer.html#method_supports", "name": "MaintenanceScreen\\TemplateRenderer\\TwigTemplateRenderer::supports", "doc": "&quot;Returns whether this renderer supports the template&quot;"},
            
            {"type": "Class", "fromName": "MaintenanceScreen", "fromLink": "MaintenanceScreen.html", "link": "MaintenanceScreen/Translator.html", "name": "MaintenanceScreen\\Translator", "doc": "&quot;Translates to some language&quot;"},
                                                        {"type": "Method", "fromName": "MaintenanceScreen\\Translator", "fromLink": "MaintenanceScreen/Translator.html", "link": "MaintenanceScreen/Translator.html#method___construct", "name": "MaintenanceScreen\\Translator::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\Translator", "fromLink": "MaintenanceScreen/Translator.html", "link": "MaintenanceScreen/Translator.html#method_getLanguage", "name": "MaintenanceScreen\\Translator::getLanguage", "doc": "&quot;Returns language name&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\Translator", "fromLink": "MaintenanceScreen/Translator.html", "link": "MaintenanceScreen/Translator.html#method_getTranslations", "name": "MaintenanceScreen\\Translator::getTranslations", "doc": "&quot;Returns all translations&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\Translator", "fromLink": "MaintenanceScreen/Translator.html", "link": "MaintenanceScreen/Translator.html#method_supports", "name": "MaintenanceScreen\\Translator::supports", "doc": "&quot;Checks translation for key exists&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\Translator", "fromLink": "MaintenanceScreen/Translator.html", "link": "MaintenanceScreen/Translator.html#method_translate", "name": "MaintenanceScreen\\Translator::translate", "doc": "&quot;Translates key&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\Translator", "fromLink": "MaintenanceScreen/Translator.html", "link": "MaintenanceScreen/Translator.html#method_fromConfigFile", "name": "MaintenanceScreen\\Translator::fromConfigFile", "doc": "&quot;Makes Translator instance from config file&quot;"},
            
            {"type": "Class", "fromName": "MaintenanceScreen\\TranslatorProvider", "fromLink": "MaintenanceScreen/TranslatorProvider.html", "link": "MaintenanceScreen/TranslatorProvider/ArrayTranslatorProvider.html", "name": "MaintenanceScreen\\TranslatorProvider\\ArrayTranslatorProvider", "doc": "&quot;Array-based Translator instances provider&quot;"},
                                                        {"type": "Method", "fromName": "MaintenanceScreen\\TranslatorProvider\\ArrayTranslatorProvider", "fromLink": "MaintenanceScreen/TranslatorProvider/ArrayTranslatorProvider.html", "link": "MaintenanceScreen/TranslatorProvider/ArrayTranslatorProvider.html#method___construct", "name": "MaintenanceScreen\\TranslatorProvider\\ArrayTranslatorProvider::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\TranslatorProvider\\ArrayTranslatorProvider", "fromLink": "MaintenanceScreen/TranslatorProvider/ArrayTranslatorProvider.html", "link": "MaintenanceScreen/TranslatorProvider/ArrayTranslatorProvider.html#method__getTranslator", "name": "MaintenanceScreen\\TranslatorProvider\\ArrayTranslatorProvider::_getTranslator", "doc": "&quot;{@inheritdoc}&quot;"},
            
            {"type": "Class", "fromName": "MaintenanceScreen\\TranslatorProvider", "fromLink": "MaintenanceScreen/TranslatorProvider.html", "link": "MaintenanceScreen/TranslatorProvider/FilesystemTranslatorProvider.html", "name": "MaintenanceScreen\\TranslatorProvider\\FilesystemTranslatorProvider", "doc": "&quot;Provides Translator instances\nfrom directories with config files&quot;"},
                                                        {"type": "Method", "fromName": "MaintenanceScreen\\TranslatorProvider\\FilesystemTranslatorProvider", "fromLink": "MaintenanceScreen/TranslatorProvider/FilesystemTranslatorProvider.html", "link": "MaintenanceScreen/TranslatorProvider/FilesystemTranslatorProvider.html#method___construct", "name": "MaintenanceScreen\\TranslatorProvider\\FilesystemTranslatorProvider::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\TranslatorProvider\\FilesystemTranslatorProvider", "fromLink": "MaintenanceScreen/TranslatorProvider/FilesystemTranslatorProvider.html", "link": "MaintenanceScreen/TranslatorProvider/FilesystemTranslatorProvider.html#method__getTranslator", "name": "MaintenanceScreen\\TranslatorProvider\\FilesystemTranslatorProvider::_getTranslator", "doc": "&quot;Makes Translator from config file&quot;"},
            
            {"type": "Class", "fromName": "MaintenanceScreen\\TranslatorProvider", "fromLink": "MaintenanceScreen/TranslatorProvider.html", "link": "MaintenanceScreen/TranslatorProvider/TranslatorProviderInterface.html", "name": "MaintenanceScreen\\TranslatorProvider\\TranslatorProviderInterface", "doc": "&quot;Interface for Translator instances providers&quot;"},
                                                        {"type": "Method", "fromName": "MaintenanceScreen\\TranslatorProvider\\TranslatorProviderInterface", "fromLink": "MaintenanceScreen/TranslatorProvider/TranslatorProviderInterface.html", "link": "MaintenanceScreen/TranslatorProvider/TranslatorProviderInterface.html#method_getTranslator", "name": "MaintenanceScreen\\TranslatorProvider\\TranslatorProviderInterface::getTranslator", "doc": "&quot;Makes Translator for language&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\TranslatorProvider\\TranslatorProviderInterface", "fromLink": "MaintenanceScreen/TranslatorProvider/TranslatorProviderInterface.html", "link": "MaintenanceScreen/TranslatorProvider/TranslatorProviderInterface.html#method_getPreferredTranslator", "name": "MaintenanceScreen\\TranslatorProvider\\TranslatorProviderInterface::getPreferredTranslator", "doc": "&quot;Makes Translator for preferred language&quot;"},
            
            {"type": "Trait", "fromName": "MaintenanceScreen\\TranslatorProvider", "fromLink": "MaintenanceScreen/TranslatorProvider.html", "link": "MaintenanceScreen/TranslatorProvider/TranslatorProviderTrait.html", "name": "MaintenanceScreen\\TranslatorProvider\\TranslatorProviderTrait", "doc": "&quot;Trait for Translator instances providers&quot;"},
                                                        {"type": "Method", "fromName": "MaintenanceScreen\\TranslatorProvider\\TranslatorProviderTrait", "fromLink": "MaintenanceScreen/TranslatorProvider/TranslatorProviderTrait.html", "link": "MaintenanceScreen/TranslatorProvider/TranslatorProviderTrait.html#method__getTranslator", "name": "MaintenanceScreen\\TranslatorProvider\\TranslatorProviderTrait::_getTranslator", "doc": "&quot;Makes Translator for language&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\TranslatorProvider\\TranslatorProviderTrait", "fromLink": "MaintenanceScreen/TranslatorProvider/TranslatorProviderTrait.html", "link": "MaintenanceScreen/TranslatorProvider/TranslatorProviderTrait.html#method_getTranslator", "name": "MaintenanceScreen\\TranslatorProvider\\TranslatorProviderTrait::getTranslator", "doc": "&quot;{@inheritdoc}&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\TranslatorProvider\\TranslatorProviderTrait", "fromLink": "MaintenanceScreen/TranslatorProvider/TranslatorProviderTrait.html", "link": "MaintenanceScreen/TranslatorProvider/TranslatorProviderTrait.html#method_getPreferredTranslator", "name": "MaintenanceScreen\\TranslatorProvider\\TranslatorProviderTrait::getPreferredTranslator", "doc": "&quot;{@inheritdoc}&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});


