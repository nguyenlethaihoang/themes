<div class="oxygen-sidebar-code-editor-wrap">
    
    <div class="oxy-code-editor-part">
        <div class="oxy-code-editor-part-title"><?php _e("CSS", "oxygen"); ?></div>
        <script>
            console.log($scope.iframeScope);
            var editor = new OxyCM.EditorView({
                state: OxyCM.EditorState.create({
                    extensions: [
                        OxyCM.basicSetup,
                        OxyCM.modules.search(),
                        OxyCM.modules.css(),
                        OxyCM.modules.oneDarkTheme,
                        OxyCM.EditorView.updateListener.of((v)=> {
                            if(v.docChanged) {
                                $scope.iframeScope.setOptionModel('code-css',editor.state.doc.toString());
                            }
                        }),
                    ],
                    doc: $scope.iframeScope.getOption('code-css')
                }),
                parent: document.getElementById("oxy-code-css-cm6")
            })
        </script>
        <div id="oxy-code-css-cm6"></div>
    </div>

    <div class="oxy-code-editor-part">
        <div class="oxy-code-editor-part-title"><?php _e("JS", "oxygen"); ?></div>
        <script>
            console.log($scope.iframeScope);
            var editor = new OxyCM.EditorView({
                state: OxyCM.EditorState.create({
                    extensions: [
                        OxyCM.basicSetup,
            OxyCM.linter(OxyCM.esLint(new OxyCM.Linter())),
                        OxyCM.lintGutter(),
                        OxyCM.modules.search(),
                        OxyCM.modules.javascript(),
                        OxyCM.modules.oneDarkTheme,
                        OxyCM.EditorView.updateListener.of((v)=> {
                            if(v.docChanged) {
                                $scope.iframeScope.setOptionModel('custom-js',editor.state.doc.toString());
                            }
                        }),
                    ],
                    doc: $scope.iframeScope.getOption('code-js')
                }),
                parent: document.getElementById("oxy-code-js-cm6")
            })
        </script>
        <div id="oxy-code-js-cm6"></div>
        <div class="oxygen-code-error-container"></div>
    </div>
    
    <div class="oxy-code-editor-part">
        <div class="oxy-code-editor-part-title"><?php _e("PHP & HTML", "oxygen"); ?></div>
        <script>
            console.log($scope.iframeScope);
            var editor = new OxyCM.EditorView({
                state: OxyCM.EditorState.create({
                    extensions: [
                        OxyCM.basicSetup,
                        OxyCM.modules.search(),
                        OxyCM.modules.php(),
                        OxyCM.modules.html(),
                        OxyCM.modules.oneDarkTheme,
                        OxyCM.EditorView.updateListener.of((v)=> {
                            if(v.docChanged) {
                                $scope.iframeScope.setOptionModel('code-php',editor.state.doc.toString());
                            }
                        }),
                    ],
                    doc: $scope.iframeScope.getOption('code-php')
                }),
                parent: document.getElementById("oxy-code-php-cm6")
            })
        </script>
        <div id="oxy-code-php-cm6"></div>
    </div>
</div>