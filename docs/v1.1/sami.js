
window.projectVersion = 'v1.1';

(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:MaintenanceScreen" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="MaintenanceScreen.html">MaintenanceScreen</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:MaintenanceScreen_ConfigurationLoaders" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="MaintenanceScreen/ConfigurationLoaders.html">ConfigurationLoaders</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:MaintenanceScreen_ConfigurationLoaders_YamlConfigurationLoader" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="MaintenanceScreen/ConfigurationLoaders/YamlConfigurationLoader.html">YamlConfigurationLoader</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:MaintenanceScreen_Configurations" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="MaintenanceScreen/Configurations.html">Configurations</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:MaintenanceScreen_Configurations_MainConfiguration" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="MaintenanceScreen/Configurations/MainConfiguration.html">MainConfiguration</a>                    </div>                </li>                            <li data-name="class:MaintenanceScreen_Configurations_TranslatorConfiguration" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="MaintenanceScreen/Configurations/TranslatorConfiguration.html">TranslatorConfiguration</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:MaintenanceScreen_ConfigurationLoader" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="MaintenanceScreen/ConfigurationLoader.html">ConfigurationLoader</a>                    </div>                </li>                            <li data-name="class:MaintenanceScreen_MaintenanceScreen" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="MaintenanceScreen/MaintenanceScreen.html">MaintenanceScreen</a>                    </div>                </li>                            <li data-name="class:MaintenanceScreen_Translator" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="MaintenanceScreen/Translator.html">Translator</a>                    </div>                </li>                            <li data-name="class:MaintenanceScreen_TranslatorProvider" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="MaintenanceScreen/TranslatorProvider.html">TranslatorProvider</a>                    </div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "MaintenanceScreen.html", "name": "MaintenanceScreen", "doc": "Namespace MaintenanceScreen"},{"type": "Namespace", "link": "MaintenanceScreen/ConfigurationLoaders.html", "name": "MaintenanceScreen\\ConfigurationLoaders", "doc": "Namespace MaintenanceScreen\\ConfigurationLoaders"},{"type": "Namespace", "link": "MaintenanceScreen/Configurations.html", "name": "MaintenanceScreen\\Configurations", "doc": "Namespace MaintenanceScreen\\Configurations"},
            
            {"type": "Class", "fromName": "MaintenanceScreen", "fromLink": "MaintenanceScreen.html", "link": "MaintenanceScreen/ConfigurationLoader.html", "name": "MaintenanceScreen\\ConfigurationLoader", "doc": "&quot;Configuraion loader&quot;"},
                                                        {"type": "Method", "fromName": "MaintenanceScreen\\ConfigurationLoader", "fromLink": "MaintenanceScreen/ConfigurationLoader.html", "link": "MaintenanceScreen/ConfigurationLoader.html#method___construct", "name": "MaintenanceScreen\\ConfigurationLoader::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\ConfigurationLoader", "fromLink": "MaintenanceScreen/ConfigurationLoader.html", "link": "MaintenanceScreen/ConfigurationLoader.html#method_loadFile", "name": "MaintenanceScreen\\ConfigurationLoader::loadFile", "doc": "&quot;Loads config file by name&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\ConfigurationLoader", "fromLink": "MaintenanceScreen/ConfigurationLoader.html", "link": "MaintenanceScreen/ConfigurationLoader.html#method_loadFileWhile", "name": "MaintenanceScreen\\ConfigurationLoader::loadFileWhile", "doc": "&quot;Loads config files by name while function returns true&quot;"},
            
            {"type": "Class", "fromName": "MaintenanceScreen\\ConfigurationLoaders", "fromLink": "MaintenanceScreen/ConfigurationLoaders.html", "link": "MaintenanceScreen/ConfigurationLoaders/YamlConfigurationLoader.html", "name": "MaintenanceScreen\\ConfigurationLoaders\\YamlConfigurationLoader", "doc": "&quot;Yaml configuration loader&quot;"},
                                                        {"type": "Method", "fromName": "MaintenanceScreen\\ConfigurationLoaders\\YamlConfigurationLoader", "fromLink": "MaintenanceScreen/ConfigurationLoaders/YamlConfigurationLoader.html", "link": "MaintenanceScreen/ConfigurationLoaders/YamlConfigurationLoader.html#method_load", "name": "MaintenanceScreen\\ConfigurationLoaders\\YamlConfigurationLoader::load", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\ConfigurationLoaders\\YamlConfigurationLoader", "fromLink": "MaintenanceScreen/ConfigurationLoaders/YamlConfigurationLoader.html", "link": "MaintenanceScreen/ConfigurationLoaders/YamlConfigurationLoader.html#method_supports", "name": "MaintenanceScreen\\ConfigurationLoaders\\YamlConfigurationLoader::supports", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "MaintenanceScreen\\Configurations", "fromLink": "MaintenanceScreen/Configurations.html", "link": "MaintenanceScreen/Configurations/MainConfiguration.html", "name": "MaintenanceScreen\\Configurations\\MainConfiguration", "doc": "&quot;ConfigurationInterface implementation for main configuration&quot;"},
                                                        {"type": "Method", "fromName": "MaintenanceScreen\\Configurations\\MainConfiguration", "fromLink": "MaintenanceScreen/Configurations/MainConfiguration.html", "link": "MaintenanceScreen/Configurations/MainConfiguration.html#method_getConfigTreeBuilder", "name": "MaintenanceScreen\\Configurations\\MainConfiguration::getConfigTreeBuilder", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "MaintenanceScreen\\Configurations", "fromLink": "MaintenanceScreen/Configurations.html", "link": "MaintenanceScreen/Configurations/TranslatorConfiguration.html", "name": "MaintenanceScreen\\Configurations\\TranslatorConfiguration", "doc": "&quot;ConfigurationInterface implementation for translations&quot;"},
                                                        {"type": "Method", "fromName": "MaintenanceScreen\\Configurations\\TranslatorConfiguration", "fromLink": "MaintenanceScreen/Configurations/TranslatorConfiguration.html", "link": "MaintenanceScreen/Configurations/TranslatorConfiguration.html#method_getConfigTreeBuilder", "name": "MaintenanceScreen\\Configurations\\TranslatorConfiguration::getConfigTreeBuilder", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "MaintenanceScreen", "fromLink": "MaintenanceScreen.html", "link": "MaintenanceScreen/MaintenanceScreen.html", "name": "MaintenanceScreen\\MaintenanceScreen", "doc": "&quot;Main class&quot;"},
                                                        {"type": "Method", "fromName": "MaintenanceScreen\\MaintenanceScreen", "fromLink": "MaintenanceScreen/MaintenanceScreen.html", "link": "MaintenanceScreen/MaintenanceScreen.html#method___construct", "name": "MaintenanceScreen\\MaintenanceScreen::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\MaintenanceScreen", "fromLink": "MaintenanceScreen/MaintenanceScreen.html", "link": "MaintenanceScreen/MaintenanceScreen.html#method_render", "name": "MaintenanceScreen\\MaintenanceScreen::render", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\MaintenanceScreen", "fromLink": "MaintenanceScreen/MaintenanceScreen.html", "link": "MaintenanceScreen/MaintenanceScreen.html#method_send", "name": "MaintenanceScreen\\MaintenanceScreen::send", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\MaintenanceScreen", "fromLink": "MaintenanceScreen/MaintenanceScreen.html", "link": "MaintenanceScreen/MaintenanceScreen.html#method_makeFrom", "name": "MaintenanceScreen\\MaintenanceScreen::makeFrom", "doc": "&quot;Makes MaintenanceScreen instance from config file&quot;"},
            
            {"type": "Class", "fromName": "MaintenanceScreen", "fromLink": "MaintenanceScreen.html", "link": "MaintenanceScreen/Translator.html", "name": "MaintenanceScreen\\Translator", "doc": "&quot;Translates to some language&quot;"},
                                                        {"type": "Method", "fromName": "MaintenanceScreen\\Translator", "fromLink": "MaintenanceScreen/Translator.html", "link": "MaintenanceScreen/Translator.html#method___construct", "name": "MaintenanceScreen\\Translator::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\Translator", "fromLink": "MaintenanceScreen/Translator.html", "link": "MaintenanceScreen/Translator.html#method_getTranslations", "name": "MaintenanceScreen\\Translator::getTranslations", "doc": "&quot;Returns all translations&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\Translator", "fromLink": "MaintenanceScreen/Translator.html", "link": "MaintenanceScreen/Translator.html#method_supports", "name": "MaintenanceScreen\\Translator::supports", "doc": "&quot;Checks translation for key exists&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\Translator", "fromLink": "MaintenanceScreen/Translator.html", "link": "MaintenanceScreen/Translator.html#method_translate", "name": "MaintenanceScreen\\Translator::translate", "doc": "&quot;Translates key&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\Translator", "fromLink": "MaintenanceScreen/Translator.html", "link": "MaintenanceScreen/Translator.html#method_fromConfigFile", "name": "MaintenanceScreen\\Translator::fromConfigFile", "doc": "&quot;Makes Translator instance from config file&quot;"},
            
            {"type": "Class", "fromName": "MaintenanceScreen", "fromLink": "MaintenanceScreen.html", "link": "MaintenanceScreen/TranslatorProvider.html", "name": "MaintenanceScreen\\TranslatorProvider", "doc": "&quot;Provides Translator instances\nfrom directories with config files&quot;"},
                                                        {"type": "Method", "fromName": "MaintenanceScreen\\TranslatorProvider", "fromLink": "MaintenanceScreen/TranslatorProvider.html", "link": "MaintenanceScreen/TranslatorProvider.html#method___construct", "name": "MaintenanceScreen\\TranslatorProvider::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\TranslatorProvider", "fromLink": "MaintenanceScreen/TranslatorProvider.html", "link": "MaintenanceScreen/TranslatorProvider.html#method_getTranslator", "name": "MaintenanceScreen\\TranslatorProvider::getTranslator", "doc": "&quot;Makes Translator from config file&quot;"},
                    {"type": "Method", "fromName": "MaintenanceScreen\\TranslatorProvider", "fromLink": "MaintenanceScreen/TranslatorProvider.html", "link": "MaintenanceScreen/TranslatorProvider.html#method_getPreferredTranslator", "name": "MaintenanceScreen\\TranslatorProvider::getPreferredTranslator", "doc": "&quot;Makes Translator from config file\nfor preferred language&quot;"},
            
            
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


