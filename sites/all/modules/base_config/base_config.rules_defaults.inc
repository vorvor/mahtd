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
        { "mail" : {
            "to" : "vorosborisz@gmail.com",
            "subject" : "Rendel\\u00e9s \\u00e9rkezett a tesla.hu oldalr\\u00f3l",
            "message" : "Megrendel\\u0151 adatai:\\r\\nN\\u00e9v: [data:ncn38373652-value]\\r\\nC\\u00edm: [data:aca837365321-value]\\r\\nTelefonsz\\u00e1m: [data:pn327894325-value]\\r\\nE-mail: [data:e9384168394-value]\\r\\nEgy\\u00e9b inform\\u00e1ci\\u00f3, megjegyz\\u00e9s: [data:n5628279321-value]\\r\\nC\\u00edm: [data:aca837365321-value]\\r\\n\\r\\nA rendel\\u00e9s adatai:\\r\\nModell: [data:model-value]\\r\\nFelszerelts\\u00e9g: [data:facility-value]\\r\\nK\\u00fcls\\u0151 sz\\u00edn: [data:exterior-value]\\r\\nFelni: [data:rim-value]\\r\\nT\\u00e9li garnit\\u00fara: [data:winter-wheel-value]\\r\\nExtra: [data:extra-value]\\r\\nBels\\u0151 sz\\u00edn: [data:interior-value]\\r\\n\\u00dcl\\u00e9sek: [data:seats-value]\\r\\nAutopilot: [data:autopilot-value]",
            "from" : "tesla.hu",
            "language" : [ "" ]
          }
        },
        { "mimemail" : {
            "USING" : {
              "key" : "order",
              "to" : "vorosborisz@gmail.com",
              "from_name" : "tesla",
              "from_mail" : "info@tesla.vivaretina.com",
              "subject" : "Rendel\\u00e9s \\u00e9rezett - teszt",
              "body" : "\\u003Cdiv id=\\u0022order-wrapper\\u0022 class=\\u0022wrapper\\u0022\\u003E\\r\\nA rendel\\u00e9s adatai:\\r\\n\\u003Cdiv class=\\u0022model\\u0022\\u003E\\r\\nModell: [data:model-value]\\r\\n\\u003C\\/div\\u003E\\r\\n\\u003Cdiv class=\\u0022facility\\u0022 id=\\u0022some-id\\u0022\\u003E\\r\\nFelszerelts\\u00e9g: [data:facility-value]\\r\\n\\u003C\\/div\\u003E\\r\\n\\u003Cdiv id=\\u0022exterior\\u0022\\u003E\\r\\nK\\u00fcls\\u0151 sz\\u00edn: [data:exterior-value]\\r\\n\\u003C\\/div\\u003E\\r\\n\\u003C\\/div\\u003E",
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
