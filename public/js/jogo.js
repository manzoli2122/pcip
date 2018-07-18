/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/babel-loader/lib/index.js?{\"cacheDirectory\":true,\"presets\":[[\"env\",{\"modules\":false,\"targets\":{\"browsers\":[\"> 2%\"],\"uglify\":true}}]],\"plugins\":[\"transform-object-rest-spread\",[\"transform-runtime\",{\"polyfill\":false,\"helpers\":false}]]}!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./resources/assets/js/components/jogo/Pergunta.vue":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__core_Form__ = __webpack_require__("./resources/assets/js/core/Form.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//



var ipAPI = 'https://api.ipify.org?format=json';
/* harmony default export */ __webpack_exports__["default"] = ({

  props: ['url'],

  data: function data() {
    return {
      form: new __WEBPACK_IMPORTED_MODULE_0__core_Form__["a" /* default */]({
        selected: '',
        pergunta_id: ''
      }),

      temp_errada: '',
      respondido: '',
      pergunta: '',
      ispergunta: true,
      respostas: '',

      placar: ''
    };
  },


  watch: {

    pergunta: function pergunta(newpergunta_id, oldpergunta_id) {
      this.atualizaRespostas();
      this.ispergunta = true;
    }

  },

  methods: {
    onSubmit: function onSubmit() {
      var _this = this;

      if (this.form.selected === this.pergunta.resposta_certa_id) {
        // toastSucessoCentro('você Acertou!!');


        swal({
          //position: 'top-end',
          type: 'success',
          showCloseButton: true,
          title: 'Você Acertou!!',
          timer: 5000,
          width: 400,
          // onOpen: () => {
          //    swal.showLoading()
          //  },
          //confirmButtonColor: '#3085d6',
          confirmButtonColor: '#646464',
          confirmButtonText: '<h4>Proxima Pergunta</h4>',
          confirmButtonClass: 'bg-green'
        }).then(function (result) {
          if (result.value) {
            _this.proximaPergunta();
          }
        });

        // swal.queue([{
        //   title: 'Your public IP',
        //   confirmButtonText: 'Show my public IP',
        //   text:
        //     'Your public IP will be received ' +
        //     'via AJAX request',
        //   showLoaderOnConfirm: true,
        //   preConfirm: () => {
        //     return fetch(ipAPI)
        //       .then(response => response.json())
        //       .then(data => swal.insertQueueStep(data.ip))
        //       .catch(() => {
        //         swal.insertQueueStep({
        //           type: 'error',
        //           title: 'Unable to get your public IP'
        //         })
        //       })
        //   }
        // }])


        // swal({
        //   title: 'Submit your Github username',
        //   input: 'text',
        //   showCancelButton: true,
        //   confirmButtonText: 'Look up',
        //   showLoaderOnConfirm: true,
        //   preConfirm: (login) => {
        //     return fetch(`//api.github.com/users/${login}`)
        //       .then(response => response.json())
        //       .catch(error => {
        //         swal.showValidationError(
        //           `Request failed: ${error}`
        //         )
        //       })
        //   },
        //   allowOutsideClick: () => !swal.isLoading()
        // }).then((result) => {
        //   if (result.value) {
        //     swal({
        //       title: `${result.value.login}'s avatar`,
        //       imageUrl: result.value.avatar_url
        //     })
        //   }
        // })


        // this.$swal('Você Acertou!!',
        //             '',
        //             'success'
        //             )


        // swal({
        //       type: 'success',
        //       title: 'Você Acertou!!',                    
        //     })
      } else {
        // this.$swal('Você Errou!!',
        //             '',
        //             'error'
        //             )


        // this.$swal({
        //   title: "Você Errou!!",
        //   text: this.ispergunta ,
        //   icon: "error",
        //   button: {
        //           ok: "Ok",
        //           proxima: "Proxima", 
        //     },
        // });

        swal({
          //position: 'top-end',
          type: 'error',
          title: 'Você Errou!!',
          timer: 5000,
          width: 400,
          // onOpen: () => {
          //    swal.showLoading()
          //  },
          confirmButtonColor: '#646464',
          confirmButtonText: '<h4>Proxima Pergunta</h4>',
          confirmButtonClass: 'bg-red'
        }).then(function (result) {
          if (result.value) {
            _this.proximaPergunta();
          }
        });

        // swal("Você Errou!!", {
        //     icon: "error",
        //     buttons: {
        //       ok: "Ok",
        //       proxima: {
        //         text: "Próxima Pergunta",
        //         value: "proxima",
        //         className: 'bg-red',
        //       },
        //     },
        //   })
        // .then((value) => {
        //           switch (value) {

        //             case "proxima":
        //               this.proximaPergunta();
        //               // swal("Pikachu fainted! You gained 500 XP!");
        //               break;

        //             default:
        //               //swal("Got away safely!");
        //           }
        //         });

        // swal({
        //       type: 'error',
        //       title: 'Você Errou!!',
        //       // text: 'Something went wrong!',
        //       footer: '<a class="btn btn-default btn-block" style="padding:10px; font-size:20px; background-color: #646464; color:white;" v-if="respondido" v-bind:class="respondido ? \'\' : \'disabled\' " v-on:click="proximaPergunta()">  Proxima Pergunta  </a>',
        //     })
        // toastErroCentro('você Errou!!');
        this.temp_errada = this.form.selected;
      }

      this.respondido = true;

      this.form.post(this.url).then(function (response) {
        _this.placar = response;
      }).catch(function (errors) {
        return console.log(errors);
      });
    },
    atualizarPergunta: function atualizarPergunta() {
      var _this2 = this;

      axios.post(this.url + '/' + this.pergunta_id).then(function (response) {
        _this2.pergunta = response.data;
      }).catch(function (error) {
        console.log('erro ao atualiza Pergunta');
      });
    },
    atualizaRespostas: function atualizaRespostas() {
      var _this3 = this;

      this.form.pergunta_id = this.pergunta.id;
      axios.post(this.url + '/' + this.pergunta.id + '/respostas').then(function (response) {
        _this3.respostas = response.data;
      }).catch(function (error) {
        console.log('erro ao atualiza Respostas');
      });
    },
    proximaPergunta: function proximaPergunta() {
      var _this4 = this;

      this.temp_errada = '';
      this.respostas = '';
      this.respondido = false;
      this.ispergunta = false;
      window.scrollTo(0, 0);

      axios.get(this.url + '/proximo').then(function (response) {
        _this4.pergunta = response.data;
      }).catch(function (error) {
        toastErro('Não foi possivel achar a proxima pergunta, talvez vc ja tenha feito todas!!!!!!!!!!!!');
      });
    }
  },

  created: function created() {
    this.proximaPergunta();
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/component-normalizer.js":
/***/ (function(module, exports) {

/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file.
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

module.exports = function normalizeComponent (
  rawScriptExports,
  compiledTemplate,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier /* server only */
) {
  var esModule
  var scriptExports = rawScriptExports = rawScriptExports || {}

  // ES6 modules interop
  var type = typeof rawScriptExports.default
  if (type === 'object' || type === 'function') {
    esModule = rawScriptExports
    scriptExports = rawScriptExports.default
  }

  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (compiledTemplate) {
    options.render = compiledTemplate.render
    options.staticRenderFns = compiledTemplate.staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = injectStyles
  }

  if (hook) {
    var functional = options.functional
    var existing = functional
      ? options.render
      : options.beforeCreate

    if (!functional) {
      // inject component registration as beforeCreate hook
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    } else {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functioal component in vue file
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return existing(h, context)
      }
    }
  }

  return {
    esModule: esModule,
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ "./node_modules/vue-loader/lib/template-compiler/index.js?{\"id\":\"data-v-7aebba2b\",\"hasScoped\":false,\"buble\":{\"transforms\":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./resources/assets/js/components/jogo/Pergunta.vue":
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _vm.ispergunta
      ? _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-xs-12" }, [
            _c(
              "h4",
              {
                staticClass: "text-center",
                staticStyle: { margin: "0px", "margin-bottom": "10px" }
              },
              [
                _c("span", [
                  _c("b", [_vm._v("DISCIPLINA:")]),
                  _vm._v(
                    " " + _vm._s(_vm.pergunta.assunto.disciplina.nome) + " "
                  )
                ])
              ]
            )
          ])
        ])
      : _vm._e(),
    _vm._v(" "),
    _vm.ispergunta
      ? _c("div", { staticClass: "box box-success box-solid" }, [
          _c("div", { staticClass: "box-header with-border" }, [
            _c(
              "h1",
              {
                staticClass: "box-title",
                staticStyle: { "font-size": "20px" }
              },
              [
                _c("b", [_vm._v("Pergunta:")]),
                _vm._v(" "),
                _c("span", {
                  domProps: { innerHTML: _vm._s(_vm.pergunta.texto) }
                })
              ]
            )
          ]),
          _vm._v(" "),
          _c(
            "form",
            {
              attrs: { method: "post", action: "#" },
              on: {
                submit: function($event) {
                  $event.preventDefault()
                  return _vm.onSubmit($event)
                }
              }
            },
            [
              _c("input", {
                attrs: { name: "pergunta_id", type: "hidden" },
                domProps: { value: _vm.pergunta.id }
              }),
              _vm._v(" "),
              _c("div", { staticClass: "box-body" }, [
                _c(
                  "div",
                  { staticClass: "row" },
                  _vm._l(_vm.respostas, function(resposta) {
                    return _c("div", { staticClass: "col-md-12" }, [
                      _c("div", { staticClass: "radio" }, [
                        _c(
                          "label",
                          {
                            class: [
                              _vm.temp_errada === resposta.id ? "text-red" : "",
                              _vm.respondido &
                              (resposta.id === _vm.pergunta.resposta_certa_id)
                                ? "text-green"
                                : ""
                            ],
                            staticStyle: { "font-size": "18px" }
                          },
                          [
                            _c("input", {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: _vm.form.selected,
                                  expression: "form.selected"
                                }
                              ],
                              staticStyle: { "margin-top": "8px" },
                              attrs: {
                                type: "radio",
                                required: "",
                                name: "resposta"
                              },
                              domProps: {
                                value: resposta.id,
                                checked: _vm._q(_vm.form.selected, resposta.id)
                              },
                              on: {
                                change: function($event) {
                                  _vm.$set(_vm.form, "selected", resposta.id)
                                }
                              }
                            }),
                            _vm._v(" "),
                            _c("span", {
                              domProps: { innerHTML: _vm._s(resposta.texto) }
                            })
                          ]
                        )
                      ])
                    ])
                  })
                )
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "box-footer align-right" }, [
                _vm.respondido
                  ? _c(
                      "a",
                      {
                        staticClass: "btn btn-default btn-block",
                        class: _vm.respondido ? "" : "disabled",
                        staticStyle: {
                          padding: "10px",
                          "font-size": "20px",
                          "background-color": "#646464",
                          color: "white"
                        },
                        on: {
                          click: function($event) {
                            _vm.proximaPergunta()
                          }
                        }
                      },
                      [_vm._v("  Proxima Pergunta  ")]
                    )
                  : _vm._e(),
                _vm._v(" "),
                !_vm.respondido
                  ? _c(
                      "button",
                      {
                        staticClass: "btn btn-success btn-block",
                        class: _vm.respondido ? "disabled" : "",
                        staticStyle: { padding: "10px", "font-size": "20px" },
                        attrs: { type: "submit" }
                      },
                      [
                        _c("i", { staticClass: "fa fa-check" }),
                        _vm._v(" Responder  ")
                      ]
                    )
                  : _vm._e()
              ])
            ]
          )
        ])
      : _vm._e(),
    _vm._v(" "),
    _vm.ispergunta
      ? _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-xs-12" }, [
            _c("h4", [
              _c("span", [
                _c("b", [_vm._v(" Acertos:")]),
                _vm._v(" " + _vm._s(_vm.placar.certas))
              ])
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "col-xs-12" }, [
            _c("h4", [
              _c("span", [
                _c("b", [_vm._v("Erradas:")]),
                _vm._v(" " + _vm._s(_vm.placar.erradas))
              ])
            ])
          ])
        ])
      : _vm._e()
  ])
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-7aebba2b", module.exports)
  }
}

/***/ }),

/***/ "./resources/assets/js/components/jogo/Pergunta.vue":
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__("./node_modules/vue-loader/lib/component-normalizer.js")
/* script */
var __vue_script__ = __webpack_require__("./node_modules/babel-loader/lib/index.js?{\"cacheDirectory\":true,\"presets\":[[\"env\",{\"modules\":false,\"targets\":{\"browsers\":[\"> 2%\"],\"uglify\":true}}]],\"plugins\":[\"transform-object-rest-spread\",[\"transform-runtime\",{\"polyfill\":false,\"helpers\":false}]]}!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./resources/assets/js/components/jogo/Pergunta.vue")
/* template */
var __vue_template__ = __webpack_require__("./node_modules/vue-loader/lib/template-compiler/index.js?{\"id\":\"data-v-7aebba2b\",\"hasScoped\":false,\"buble\":{\"transforms\":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./resources/assets/js/components/jogo/Pergunta.vue")
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/assets/js/components/jogo/Pergunta.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-7aebba2b", Component.options)
  } else {
    hotAPI.reload("data-v-7aebba2b", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ "./resources/assets/js/core/Errors.js":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Errors = function () {
    /**
     * Create a new Errors instance.
     */
    function Errors() {
        _classCallCheck(this, Errors);

        this.errors = {};
    }

    /**
     * Determine if an errors exists for the given field.
     *
     * @param {string} field
     */


    _createClass(Errors, [{
        key: "has",
        value: function has(field) {
            return this.errors.hasOwnProperty(field);
        }

        /**
         * Determine if we have any errors.
         */

    }, {
        key: "any",
        value: function any() {
            // console.log(this.errors);
            return Object.keys(this.errors).length > 0;
        }

        /**
         * Retrieve the error message for a field.
         *
         * @param {string} field
         */

    }, {
        key: "get",
        value: function get(field) {
            // console.log(this.errors['message']);
            if (this.errors[field]) {
                return this.errors[field][0];
            }
        }

        /**
         * Record the new errors.
         *
         * @param {object} errors
         */

    }, {
        key: "record",
        value: function record(errors) {
            //console.log(errors);
            this.errors = errors.errors;
        }

        /**
         * Clear one or all error fields.
         *
         * @param {string|null} field
         */

    }, {
        key: "clear",
        value: function clear(field) {
            if (field) {
                delete this.errors[field];

                return;
            }

            this.errors = {};
        }
    }]);

    return Errors;
}();

/* harmony default export */ __webpack_exports__["a"] = (Errors);

/***/ }),

/***/ "./resources/assets/js/core/Form.js":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__Errors__ = __webpack_require__("./resources/assets/js/core/Errors.js");
var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }



var Form = function () {
    /**
     * Create a new Form instance.
     *
     * @param {object} data
     */
    function Form(data) {
        _classCallCheck(this, Form);

        this.originalData = data;

        for (var field in data) {
            this[field] = data[field];
        }

        this.errors = new __WEBPACK_IMPORTED_MODULE_0__Errors__["a" /* default */]();
    }

    /**
     * Fetch all relevant data for the form.
     */


    _createClass(Form, [{
        key: 'data',
        value: function data() {
            var data = {};

            for (var property in this.originalData) {
                data[property] = this[property];
            }

            return data;
        }

        /**
         * Reset the form fields.
         */

    }, {
        key: 'reset',
        value: function reset() {
            for (var field in this.originalData) {
                if (field != 'pergunta_id') {
                    this[field] = '';
                }
            }

            this.errors.clear();
        }

        /**
         * Send a POST request to the given URL.
         * .
         * @param {string} url
         */

    }, {
        key: 'post',
        value: function post(url) {
            return this.submit('post', url);
        }

        /**
         * Send a PUT request to the given URL.
         * .
         * @param {string} url
         */

    }, {
        key: 'put',
        value: function put(url) {
            return this.submit('put', url);
        }

        /**
         * Send a PATCH request to the given URL.
         * .
         * @param {string} url
         */

    }, {
        key: 'patch',
        value: function patch(url) {
            return this.submit('patch', url);
        }

        /**
         * Send a DELETE request to the given URL.
         * .
         * @param {string} url
         */

    }, {
        key: 'delete',
        value: function _delete(url) {
            return this.submit('delete', url);
        }

        /**
         * Submit the form.
         *
         * @param {string} requestType
         * @param {string} url
         */

    }, {
        key: 'submit',
        value: function submit(requestType, url) {
            var _this = this;

            return new Promise(function (resolve, reject) {
                axios[requestType](url, _this.data()).then(function (response) {
                    _this.onSuccess(response.data);

                    resolve(response.data);
                }).catch(function (error) {

                    if (error.response.status == '403') {
                        toastErro('Usuario sem Permissão!');
                    } else {
                        _this.onFail(error.response.data);
                    }

                    reject(error.response);
                });
            });
        }

        /**
         * Handle a successful form submission.
         *
         * @param {object} data
         */

    }, {
        key: 'onSuccess',
        value: function onSuccess(data) {

            //alert(data.message); // temporary


            this.reset();
        }

        /**
         * Handle a failed form submission.
         *
         * @param {object} errors
         */

    }, {
        key: 'onFail',
        value: function onFail(errors) {
            toastErro(errors.message);
            this.errors.record(errors);
        }
    }]);

    return Form;
}();

/* harmony default export */ __webpack_exports__["a"] = (Form);

/***/ }),

/***/ "./resources/assets/js/vue/jogo.js":
/***/ (function(module, exports, __webpack_require__) {


Vue.component('formulario-jogo', __webpack_require__("./resources/assets/js/components/jogo/Pergunta.vue"));

var jogo = new Vue({
    el: '#jogo'
});

/***/ }),

/***/ 3:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("./resources/assets/js/vue/jogo.js");


/***/ })

/******/ });