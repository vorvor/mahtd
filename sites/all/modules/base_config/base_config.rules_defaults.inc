<?php

/**
 * @file
 * base_config.rules_defaults.inc
 */

/**
 * Implements hook_default_rules_configuration().
 */
function base_config_default_rules_configuration() {
  $items = array();
  $items['rules_send_accessories_order'] = entity_import('rules_config', '{ "rules_send_accessories_order" : {
      "LABEL" : "Send accessories order",
      "PLUGIN" : "reaction rule",
      "OWNER" : "rules",
      "REQUIRES" : [ "webform_rules", "rules", "mimemail" ],
      "ON" : { "webform_rules_submit" : [] },
      "IF" : [
        { "webform_has_id" : {
            "form_id" : "webform-client-form-19",
            "selected_webform" : { "value" : { "webform-client-form-34" : "webform-client-form-34" } }
          }
        }
      ],
      "DO" : [
        { "mimemail" : {
            "USING" : {
              "key" : "accessories-order",
              "to" : "vorosborisz@gmail.com",
              "cc" : "vorosborisz@gmail.com",
              "bcc" : "vorosborisz@gmail.com",
              "subject" : "Kieg\\u00e9szt\\u0151 rendel\\u00e9s \\u00e9rkezett a tesla.hu oldalr\\u00f3l",
              "body" : "\\u003Cdiv id=\\u0022order-wrapper\\u0022 class=\\u0022wrapper\\u0022\\u003E\\r\\n\\u003Cstrong\\u003EMegrendel\\u0151 adatai:\\u003C\\/strong\\u003E\\u003Cbr \\/\\u003E\\r\\nN\\u00e9v: [data:name-value]\\u003Cbr \\/\\u003E\\r\\nC\\u00edm: [data:add7892349-value]\\u003Cbr \\/\\u003E\\r\\nTelefonsz\\u00e1m: [data:rd456378456-value]\\u003Cbr \\/\\u003E\\r\\nE-mail: [data:qr187453674854-value]\\u003Cbr \\/\\u003E\\r\\nEgy\\u00e9b inform\\u00e1ci\\u00f3, megjegyz\\u00e9s: [data:note-value]\\u003Cbr \\/\\u003E\\r\\n\\u003Cbr \\/\\u003E\\u003Cbr \\/\\u003E\\r\\n\\u003Cstrong\\u003EA rendel\\u00e9s adatai:\\u003C\\/strong\\u003E\\u003Cbr \\/\\u003E\\r\\nKieg\\u00e9sz\\u00edt\\u0151: [data:accessories-value]\\u003Cbr \\/\\u003E\\r\\n\\u003C\\/div\\u003E",
              "language" : [ "" ]
            },
            "PROVIDE" : { "send_status" : { "send_status" : "Send status" } }
          }
        }
      ]
    }
  }');
  $items['rules_send_contact_form_in_email'] = entity_import('rules_config', '{ "rules_send_contact_form_in_email" : {
      "LABEL" : "Send contact form in email",
      "PLUGIN" : "reaction rule",
      "OWNER" : "rules",
      "REQUIRES" : [ "webform_rules", "rules" ],
      "ON" : { "webform_rules_submit" : [] },
      "IF" : [
        { "webform_has_id" : {
            "form_id" : "webform-client-form-8",
            "selected_webform" : { "value" : { "webform-client-form-8" : "webform-client-form-8" } }
          }
        }
      ],
      "DO" : [
        { "mail" : {
            "to" : "vorosborisz@gmail.com",
            "subject" : "Kapcsolati \\u0171rlapr\\u00f3l \\u00fczenet \\u00e9rkezet - tesla.hu",
            "message" : "N\\u00e9v: [data:name-value]\\r\\nEmail: [data:qr187453674854-value]\\r\\nTelefonsz\\u00e1m: [data:rd456378456-value]\\r\\n\\u00dczenet: [data:message-value]",
            "from" : "tesla.hu",
            "language" : [ "" ]
          }
        }
      ]
    }
  }');
  $items['rules_send_order_in_email'] = entity_import('rules_config', '{ "rules_send_order_in_email" : {
      "LABEL" : "Send order in email",
      "PLUGIN" : "reaction rule",
      "OWNER" : "rules",
      "REQUIRES" : [ "webform_rules", "rules", "mimemail" ],
      "ON" : { "webform_rules_submit" : [] },
      "IF" : [
        { "webform_has_id" : {
            "form_id" : "webform-client-form-9",
            "selected_webform" : { "value" : { "webform-client-form-9" : "webform-client-form-9" } }
          }
        }
      ],
      "DO" : [
        { "mimemail" : {
            "USING" : {
              "key" : "order",
              "to" : "vorosborisz@gmail.com",
              "from_name" : "tesla",
              "from_mail" : "info@tesla.vivaretina.com",
              "subject" : "Rendel\\u00e9s \\u00e9rkezett",
              "body" : "\\u003Cdiv id=\\u0022order-wrapper\\u0022 class=\\u0022wrapper\\u0022\\u003E\\r\\n\\u003Cstrong\\u003EMegrendel\\u0151 adatai:\\u003C\\/strong\\u003E\\u003Cbr \\/\\u003E\\r\\nN\\u00e9v: [data:ncn38373652-value]\\u003Cbr \\/\\u003E\\r\\nC\\u00edm: [data:aca837365321-value]\\u003Cbr \\/\\u003E\\r\\nTelefonsz\\u00e1m: [data:pn327894325-value]\\u003Cbr \\/\\u003E\\r\\nE-mail: [data:e9384168394-value]\\u003Cbr \\/\\u003E\\r\\nEgy\\u00e9b inform\\u00e1ci\\u00f3, megjegyz\\u00e9s: [data:n5628279321-value]\\u003Cbr \\/\\u003E\\r\\nC\\u00edm: [data:aca837365321-value]\\u003Cbr \\/\\u003E\\r\\n\\u003Cbr \\/\\u003E\\u003Cbr \\/\\u003E\\r\\n\\u003Cstrong\\u003EA rendel\\u00e9s adatai:\\u003C\\/strong\\u003E\\u003Cbr \\/\\u003E\\r\\nModell: [data:model-value]\\u003Cbr \\/\\u003E\\r\\nFelszerelts\\u00e9g: [data:facility-value]\\u003Cbr \\/\\u003E\\r\\nK\\u00fcls\\u0151 sz\\u00edn: [data:exterior-value]\\u003Cbr \\/\\u003E\\r\\nFelni: [data:rim-value]\\u003Cbr \\/\\u003E\\r\\nT\\u00e9li garnit\\u00fara: [data:winter-wheel-value]\\u003Cbr \\/\\u003E\\r\\nExtra: [data:extra-value]\\u003Cbr \\/\\u003E\\r\\nBels\\u0151 sz\\u00edn: [data:interior-value]\\u003Cbr \\/\\u003E\\r\\n\\u00dcl\\u00e9sek: [data:seats-value]\\u003Cbr \\/\\u003E\\r\\nAutopilot: [data:autopilot-value]\\u003Cbr \\/\\u003E\\r\\n\\u003Cbr \\/\\u003E\\u003Cbr \\/\\u003E\\r\\n\\u003Cstrong\\u003EFinansz\\u00edroz\\u00e1s:\\u003C\\/strong\\u003E\\u003Cbr \\/\\u003E\\r\\nFinansz\\u00edroz\\u00e1s ig\\u00e9nybev\\u00e9tel\\u00e9vel t\\u00f6rt\\u00e9n\\u0151 v\\u00e1s\\u00e1rl\\u00e1s? [data:funding-value]\\u003Cbr \\/\\u003E\\r\\nKonstrukci\\u00f3: [data:financial_construction-value]\\u003Cbr \\/\\u003E\\r\\nKezd\\u0151 befizet\\u00e9s sz\\u00e1zal\\u00e9kban: [data:inital_deposit-value] [data:inital_deposit_open_end-value] [data:inital_deposit_rental-value]\\u003Cbr \\/\\u003E\\r\\nFutamid\\u0151: [data:duration-value]\\u003Cbr \\/\\u003E\\r\\nDevizanem: [data:currency-value]\\u003Cbr \\/\\u003E\\r\\nMaradv\\u00e1ny\\u00e9rt\\u00e9k: [data:remain_24-value][data:remain_24_36-value][data:remain_36_48-value][data:remain_48-value]\\u003Cbr \\/\\u003E\\r\\n\\u003C\\/div\\u003E",
              "plaintext" : "plain text ",
              "language" : [ "" ]
            },
            "PROVIDE" : { "send_status" : { "send_status" : "Send status" } }
          }
        }
      ]
    }
  }');
  return $items;
}
