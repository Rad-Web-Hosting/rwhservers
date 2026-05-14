<?php

if (!defined('WHMCS')) {
    die('This file cannot be accessed directly.');
}

use WHMCS\Database\Capsule;

function product_json_migrator_config()
{
    return [
        'name' => 'Product JSON Migrator',
        'description' => 'Export and import WHMCS products, pricing, custom fields, and configurable options using JSON.',
        'version' => '1.1.0',
        'author' => "<a href='https://radwebhosting.com/' target='_blank'><img width='100px' src='data:image/png;base64,R0lGODlhjAAtAPcAAAAAAAAAMwAAZgAAmQAAzAAA/wArAAArMwArZgArmQArzAAr/wBVAABVMwBVZgBVmQBVzABV/wCAAACAMwCAZgCAmQCAzACA/wCqAACqMwCqZgCqmQCqzACq/wDVAADVMwDVZgDVmQDVzADV/wD/AAD/MwD/ZgD/mQD/zAD//zMAADMAMzMAZjMAmTMAzDMA/zMrADMrMzMrZjMrmTMrzDMr/zNVADNVMzNVZjNVmTNVzDNV/zOAADOAMzOAZjOAmTOAzDOA/zOqADOqMzOqZjOqmTOqzDOq/zPVADPVMzPVZjPVmTPVzDPV/zP/ADP/MzP/ZjP/mTP/zDP//2YAAGYAM2YAZmYAmWYAzGYA/2YrAGYrM2YrZmYrmWYrzGYr/2ZVAGZVM2ZVZmZVmWZVzGZV/2aAAGaAM2aAZmaAmWaAzGaA/2aqAGaqM2aqZmaqmWaqzGaq/2bVAGbVM2bVZmbVmWbVzGbV/2b/AGb/M2b/Zmb/mWb/zGb//5kAAJkAM5kAZpkAmZkAzJkA/5krAJkrM5krZpkrmZkrzJkr/5lVAJlVM5lVZplVmZlVzJlV/5mAAJmAM5mAZpmAmZmAzJmA/5mqAJmqM5mqZpmqmZmqzJmq/5nVAJnVM5nVZpnVmZnVzJnV/5n/AJn/M5n/Zpn/mZn/zJn//8wAAMwAM8wAZswAmcwAzMwA/8wrAMwrM8wrZswrmcwrzMwr/8xVAMxVM8xVZsxVmcxVzMxV/8yAAMyAM8yAZsyAmcyAzMyA/8yqAMyqM8yqZsyqmcyqzMyq/8zVAMzVM8zVZszVmczVzMzV/8z/AMz/M8z/Zsz/mcz/zMz///8AAP8AM/8AZv8Amf8AzP8A//8rAP8rM/8rZv8rmf8rzP8r//9VAP9VM/9VZv9Vmf9VzP9V//+AAP+AM/+AZv+Amf+AzP+A//+qAP+qM/+qZv+qmf+qzP+q///VAP/VM//VZv/Vmf/VzP/V////AP//M///Zv//mf//zP///wAAAAAAAAAAAAAAACH5BAEAAPwALAAAAACMAC0AAAj/APcJHEiwoMGDCBMqXMiwocOHECNKnEixosWLGDNq3Mixo8ePIEOKHEmypMmTKFOqXMmypcuXMGPKnEmzps2bOHPq3LkzlAUgQHgKPQiNWCajSCdlmmdhmLKhUPdlEoMmjaSqknyMkVRhkpioQycdDBUqWlA0YIVmelow1NNQ+9AKnBTjRoy6Mb5OtPCA4AO4Ah9Ek6hsBbSCMeTSJCaGauPGaHI8FiswU4xJaDCLiVGQLcGnyjzvCyVYoCYIcARu6rtv2bJor5cJhE1btkBlMUTvuzywXuh9vz8D96zMN2i2xDsTXKZMH3OCsE+5lh4NDhyzsAdaJqgJhm3gdwlu/75798bAB0H3AakAQSAQC8AfyJ8f+AGE+fDB605cmbx/0DEEAMNdADwVgwH+rZDJPgAsyCBlAolB2YD+5SYQHD8AYYSGHAIBxwNG5LcPXQQRE4M+A6GxmWdoWAieXvfJhhprD6QWDQTfDWQBKANFwxpuxERDz3M3UCYJDvvUcxhuoOklUBrEEHSDgwLFEOU+dik25T70HADcbTewlZpBoCxDjxH7jClVDJkolUkYXg60QjSSmCdQiwSRmCZqPu6D2jIPyKZMjcvwqCMcy7i12m13UUheGnc6qd8+xIRJjDKXInalQAcM0xqb/O0jxoK4DVQcQXAAFg2K+2zCY1Dprf+pYgw4jDoQVQKtwBZdnlnG1gMWWJemBUa0t8+N7CVAEBD32VejQJVeGlpoN0gyl6TLuEjeAQNSuZu3MGiyjz6c4WaeraVSiqABV5JmAQTvWmABe/IGO5CediGGRps3QBoXZ9oBvA+wf6UJ7JiAAkaQvbP96OJAMfirIkH6HMAWNNOK6u3D3woUQH+NLbgMDLcZ5SI9ytCTDMrzEKNJJvT8gHLAtwqcyQ0qzjqXi+YOVCxrfgbacI4CWSBuw4zuZ21ckgIp1aYjbrzx0SRDaxepAlfJViaZTaLU15lkksNUKWZ9YD37rAD1DV+JYRd5dp4nIrCmztdsYPfl/SMAgxGmFHF/FcZwWCYrbBuu30cLBICnynzc2wEOBu4ihASBQhaaitXjLaZPeQtclKFdmmlB2c0mGlllgrKJQIW6FYqhAnlakFMDXfqJ6J6BQkwynBekCaux9y27qfTclgwxugf39LEoDqaJuGelxZMymWVm1SRppJGJJF5LL30oiIroPVjLGCHs+Oinr/767Lfv/vvwxy///PTXb//9+Oev//789+///0IJCAA7'></a>",
        'language' => 'english',
        'fields' => [
            'allow_import' => [
                'FriendlyName' => 'Allow Import',
                'Type' => 'yesno',
                'Description' => 'Enable JSON import tools.',
                'Default' => 'on',
            ],
        ],
    ];
}

function product_json_migrator_activate()
{
    return [
        'status' => 'success',
        'description' => 'Product JSON Migrator activated successfully.',
    ];
}

function product_json_migrator_deactivate()
{
    return [
        'status' => 'success',
        'description' => 'Product JSON Migrator deactivated successfully.',
    ];
}

function product_json_migrator_output($vars)
{
    $modulelink = $vars['modulelink'];
    $allowImport = !empty($vars['allow_import']);

    try {
        product_json_migrator_assert_tables();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            product_json_migrator_check_admin_token();

            $action = $_POST['pjm_action'] ?? '';

            if ($action === 'export') {
                product_json_migrator_handle_export();
                exit;
            }

            if ($action === 'import' && $allowImport) {
                $result = product_json_migrator_handle_import();
                echo product_json_migrator_render_page($modulelink, $allowImport, $result);
                return;
            }
        }

        echo product_json_migrator_render_page($modulelink, $allowImport);
    } catch (Throwable $e) {
        echo '<div class="alert alert-danger">';
        echo '<strong>Product JSON Migrator Error:</strong><br>';
        echo htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
        echo '</div>';

        echo product_json_migrator_render_page($modulelink, $allowImport);
    }
}

function product_json_migrator_render_page($modulelink, $allowImport, $resultHtml = '')
{
    $groups = Capsule::table('tblproductgroups')
        ->select('id', 'name')
        ->orderBy('order', 'asc')
        ->orderBy('name', 'asc')
        ->get();

    ob_start();

    echo '<h2>Product JSON Migrator</h2>';

    echo '<p>';
    echo 'Export and import WHMCS product groups, products, pricing, custom fields, and configurable options using JSON.';
    echo '</p>';

    echo '<div class="alert alert-warning">';
    echo '<strong>Important:</strong> Always take a full WHMCS database backup before importing. ';
    echo 'Use Dry Run first to preview changes.';
    echo '</div>';

    if ($resultHtml) {
        echo $resultHtml;
    }

    echo '<div class="row">';

    echo '<div class="col-md-6">';
    echo '<div class="panel panel-default">';
    echo '<div class="panel-heading"><strong>Export Products to JSON</strong></div>';
    echo '<div class="panel-body">';
    echo '<form method="post" action="' . htmlspecialchars($modulelink, ENT_QUOTES, 'UTF-8') . '">';
    echo product_json_migrator_token_field();
    echo '<input type="hidden" name="pjm_action" value="export">';

    echo '<div class="form-group">';
    echo '<label>Product Group</label>';
    echo '<select name="export_group_id" class="form-control">';
    echo '<option value="0">All Product Groups</option>';

    foreach ($groups as $group) {
        echo '<option value="' . (int) $group->id . '">';
        echo htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8');
        echo '</option>';
    }

    echo '</select>';
    echo '</div>';

    echo '<button type="submit" class="btn btn-primary">Download JSON Export</button>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

    echo '<div class="col-md-6">';
    echo '<div class="panel panel-default">';
    echo '<div class="panel-heading"><strong>Import Products from JSON</strong></div>';
    echo '<div class="panel-body">';

    if (!$allowImport) {
        echo '<div class="alert alert-info">';
        echo 'Import is disabled in the addon module settings.';
        echo '</div>';
    } else {
        echo '<form method="post" enctype="multipart/form-data" action="' . htmlspecialchars($modulelink, ENT_QUOTES, 'UTF-8') . '">';
        echo product_json_migrator_token_field();
        echo '<input type="hidden" name="pjm_action" value="import">';

        echo '<div class="form-group">';
        echo '<label>Import Mode</label>';
        echo '<select name="import_mode" class="form-control">';
        echo '<option value="upsert">Upsert by Name</option>';
        echo '<option value="insert">Insert Only</option>';
        echo '</select>';
        echo '</div>';

        echo '<div class="checkbox">';
        echo '<label>';
        echo '<input type="checkbox" name="dry_run" value="1" checked> Dry Run only';
        echo '</label>';
        echo '</div>';

        echo '<div class="form-group">';
        echo '<label>Upload JSON File</label>';
        echo '<input type="file" name="json_file" accept="application/json,.json" class="form-control">';
        echo '</div>';

        echo '<div class="form-group">';
        echo '<label>Or Paste JSON</label>';
        echo '<textarea name="json_text" class="form-control" rows="8" placeholder="Paste exported JSON here"></textarea>';
        echo '</div>';

        echo '<button type="submit" class="btn btn-success">Import JSON</button>';
        echo '</form>';
    }

    echo '</div>';
    echo '</div>';
    echo '</div>';

    echo '</div>';

    echo '<hr>';

    echo '<h3>What This Module Migrates</h3>';
    echo '<table class="table table-striped table-bordered">';
    echo '<thead><tr><th>Data</th><th>WHMCS Table</th><th>Import Behavior</th></tr></thead>';
    echo '<tbody>';
    echo '<tr><td>Product Groups</td><td>tblproductgroups</td><td>Matched by group name in upsert mode</td></tr>';
    echo '<tr><td>Products</td><td>tblproducts</td><td>Matched by product group and product name in upsert mode</td></tr>';
    echo '<tr><td>Product Pricing</td><td>tblpricing</td><td>Matched by type, product ID, and currency</td></tr>';
    echo '<tr><td>Product Custom Fields</td><td>tblcustomfields</td><td>Matched by product ID and field name</td></tr>';
    echo '<tr><td>Configurable Option Groups</td><td>tblproductconfiggroups</td><td>Matched by group name in upsert mode</td></tr>';
    echo '<tr><td>Configurable Option Links</td><td>tblproductconfiglinks</td><td>Matched by configurable option group and product</td></tr>';
    echo '<tr><td>Configurable Options</td><td>tblproductconfigoptions</td><td>Matched by configurable option group and option name</td></tr>';
    echo '<tr><td>Configurable Option Sub-Options</td><td>tblproductconfigoptionssub</td><td>Matched by configurable option and sub-option name</td></tr>';
    echo '<tr><td>Configurable Option Pricing</td><td>tblpricing</td><td>Matched by type, sub-option ID, and currency</td></tr>';
    echo '</tbody>';
    echo '</table>';

    return ob_get_clean();
}

function product_json_migrator_handle_export()
{
    $groupId = isset($_POST['export_group_id']) ? (int) $_POST['export_group_id'] : 0;

    $groupsQuery = Capsule::table('tblproductgroups')
        ->orderBy('order', 'asc')
        ->orderBy('name', 'asc');

    if ($groupId > 0) {
        $groupsQuery->where('id', $groupId);
    }

    $groups = product_json_migrator_collection_to_array($groupsQuery->get());
    $groupIds = array_column($groups, 'id');

    $productsQuery = Capsule::table('tblproducts')
        ->orderBy('gid', 'asc')
        ->orderBy('order', 'asc')
        ->orderBy('name', 'asc');

    if (!empty($groupIds)) {
        $productsQuery->whereIn('gid', $groupIds);
    } else {
        $productsQuery->whereRaw('1 = 0');
    }

    $products = product_json_migrator_collection_to_array($productsQuery->get());
    $productIds = array_column($products, 'id');

    $productPricing = [];
    $customFields = [];
    $configLinks = [];
    $configGroups = [];
    $configOptions = [];
    $configSubOptions = [];
    $configPricing = [];

    if (!empty($productIds)) {
        $productPricing = product_json_migrator_collection_to_array(
            Capsule::table('tblpricing')
                ->where('type', 'product')
                ->whereIn('relid', $productIds)
                ->orderBy('relid', 'asc')
                ->orderBy('currency', 'asc')
                ->get()
        );

        $customFields = product_json_migrator_collection_to_array(
            Capsule::table('tblcustomfields')
                ->where('type', 'product')
                ->whereIn('relid', $productIds)
                ->orderBy('relid', 'asc')
                ->orderBy('sortorder', 'asc')
                ->orderBy('fieldname', 'asc')
                ->get()
        );

        $configLinks = product_json_migrator_collection_to_array(
            Capsule::table('tblproductconfiglinks')
                ->whereIn('pid', $productIds)
                ->orderBy('gid', 'asc')
                ->orderBy('pid', 'asc')
                ->get()
        );

        $configGroupIds = array_values(array_unique(array_column($configLinks, 'gid')));

        if (!empty($configGroupIds)) {
            $configGroups = product_json_migrator_collection_to_array(
                Capsule::table('tblproductconfiggroups')
                    ->whereIn('id', $configGroupIds)
                    ->orderBy('name', 'asc')
                    ->get()
            );

            $configOptions = product_json_migrator_collection_to_array(
                Capsule::table('tblproductconfigoptions')
                    ->whereIn('gid', $configGroupIds)
                    ->orderBy('gid', 'asc')
                    ->orderBy('order', 'asc')
                    ->orderBy('optionname', 'asc')
                    ->get()
            );

            $configOptionIds = array_column($configOptions, 'id');

            if (!empty($configOptionIds)) {
                $configSubOptions = product_json_migrator_collection_to_array(
                    Capsule::table('tblproductconfigoptionssub')
                        ->whereIn('configid', $configOptionIds)
                        ->orderBy('configid', 'asc')
                        ->orderBy('sortorder', 'asc')
                        ->orderBy('optionname', 'asc')
                        ->get()
                );

                $configSubOptionIds = array_column($configSubOptions, 'id');

                if (!empty($configSubOptionIds)) {
                    $configPricing = product_json_migrator_collection_to_array(
                        Capsule::table('tblpricing')
                            ->where('type', 'configoptions')
                            ->whereIn('relid', $configSubOptionIds)
                            ->orderBy('relid', 'asc')
                            ->orderBy('currency', 'asc')
                            ->get()
                    );
                }
            }
        }
    }

    $payload = [
        'schema' => 'whmcs_product_json_migrator',
        'schema_version' => 2,
        'created_at' => gmdate('c'),
        'source' => [
            'whmcs_version' => defined('WHMCS_VERSION') ? WHMCS_VERSION : null,
        ],
        'counts' => [
            'product_groups' => count($groups),
            'products' => count($products),
            'product_pricing' => count($productPricing),
            'custom_fields' => count($customFields),
            'config_option_groups' => count($configGroups),
            'config_option_links' => count($configLinks),
            'config_options' => count($configOptions),
            'config_option_suboptions' => count($configSubOptions),
            'config_option_pricing' => count($configPricing),
        ],
        'data' => [
            'product_groups' => $groups,
            'products' => $products,
            'product_pricing' => $productPricing,
            'custom_fields' => $customFields,
            'config_option_groups' => $configGroups,
            'config_option_links' => $configLinks,
            'config_options' => $configOptions,
            'config_option_suboptions' => $configSubOptions,
            'config_option_pricing' => $configPricing,
        ],
    ];

    $filename = 'whmcs-products-export-' . gmdate('Ymd-His') . '.json';

    while (ob_get_level()) {
        ob_end_clean();
    }

    header('Content-Type: application/json; charset=utf-8');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');

    echo json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}

function product_json_migrator_handle_import()
{
    $mode = $_POST['import_mode'] ?? 'upsert';
    $dryRun = !empty($_POST['dry_run']);

    if (!in_array($mode, ['upsert', 'insert'], true)) {
        throw new RuntimeException('Invalid import mode.');
    }

    $json = '';

    if (!empty($_FILES['json_file']['tmp_name']) && is_uploaded_file($_FILES['json_file']['tmp_name'])) {
        $json = file_get_contents($_FILES['json_file']['tmp_name']);
    }

    if (!$json && !empty($_POST['json_text'])) {
        $json = trim((string) $_POST['json_text']);
    }

    if (!$json) {
        throw new RuntimeException('No JSON file or pasted JSON was provided.');
    }

    $payload = json_decode($json, true);

    if (!is_array($payload)) {
        throw new RuntimeException('Invalid JSON payload.');
    }

    if (($payload['schema'] ?? '') !== 'whmcs_product_json_migrator') {
        throw new RuntimeException('This JSON file does not appear to be a Product JSON Migrator export.');
    }

    $data = $payload['data'] ?? [];

    $groups = $data['product_groups'] ?? [];
    $products = $data['products'] ?? [];

    $productPricing = $data['product_pricing'] ?? ($data['pricing'] ?? []);
    $customFields = $data['custom_fields'] ?? [];

    $configGroups = $data['config_option_groups'] ?? [];
    $configLinks = $data['config_option_links'] ?? [];
    $configOptions = $data['config_options'] ?? [];
    $configSubOptions = $data['config_option_suboptions'] ?? [];
    $configPricing = $data['config_option_pricing'] ?? [];

    foreach ([
        $groups,
        $products,
        $productPricing,
        $customFields,
        $configGroups,
        $configLinks,
        $configOptions,
        $configSubOptions,
        $configPricing,
    ] as $section) {
        if (!is_array($section)) {
            throw new RuntimeException('JSON payload contains invalid data sections.');
        }
    }

    $report = [
        'dry_run' => $dryRun,
        'mode' => $mode,

        'groups_inserted' => 0,
        'groups_updated' => 0,

        'products_inserted' => 0,
        'products_updated' => 0,

        'product_pricing_inserted' => 0,
        'product_pricing_updated' => 0,

        'custom_fields_inserted' => 0,
        'custom_fields_updated' => 0,

        'config_groups_inserted' => 0,
        'config_groups_updated' => 0,

        'config_links_inserted' => 0,
        'config_links_existing' => 0,

        'config_options_inserted' => 0,
        'config_options_updated' => 0,

        'config_suboptions_inserted' => 0,
        'config_suboptions_updated' => 0,

        'config_pricing_inserted' => 0,
        'config_pricing_updated' => 0,

        'skipped' => [],

        'id_maps' => [
            'groups' => [],
            'products' => [],
            'config_groups' => [],
            'config_options' => [],
            'config_suboptions' => [],
        ],
    ];

    $connection = Capsule::connection();

    if (!$dryRun) {
        $connection->beginTransaction();
    }

    try {
        product_json_migrator_import_groups($groups, $mode, $dryRun, $report);
        product_json_migrator_import_products($products, $mode, $dryRun, $report);
        product_json_migrator_import_product_pricing($productPricing, $dryRun, $report);
        product_json_migrator_import_custom_fields($customFields, $dryRun, $report);

        product_json_migrator_import_config_groups($configGroups, $mode, $dryRun, $report);
        product_json_migrator_import_config_links($configLinks, $dryRun, $report);
        product_json_migrator_import_config_options($configOptions, $mode, $dryRun, $report);
        product_json_migrator_import_config_suboptions($configSubOptions, $mode, $dryRun, $report);
        product_json_migrator_import_config_pricing($configPricing, $dryRun, $report);

        if (!$dryRun) {
            $connection->commit();
        }
    } catch (Throwable $e) {
        if (!$dryRun) {
            $connection->rollBack();
        }

        throw $e;
    }

    return product_json_migrator_render_import_report($report);
}

function product_json_migrator_import_groups(array $groups, $mode, $dryRun, array &$report)
{
    foreach ($groups as $group) {
        if (!is_array($group)) {
            continue;
        }

        $oldId = isset($group['id']) ? (int) $group['id'] : 0;
        $name = trim((string) ($group['name'] ?? ''));

        if ($name === '') {
            $report['skipped'][] = 'Skipped product group with empty name.';
            continue;
        }

        $existing = null;

        if ($mode === 'upsert') {
            $existing = Capsule::table('tblproductgroups')
                ->where('name', $name)
                ->first();
        }

        $row = product_json_migrator_prepare_row('tblproductgroups', $group, ['id']);

        if ($existing) {
            $newId = (int) $existing->id;
            $report['id_maps']['groups'][$oldId] = $newId;

            if (!$dryRun) {
                Capsule::table('tblproductgroups')
                    ->where('id', $newId)
                    ->update($row);
            }

            $report['groups_updated']++;
        } else {
            if ($dryRun) {
                $newId = $oldId ?: -1;
            } else {
                $newId = (int) Capsule::table('tblproductgroups')
                    ->insertGetId($row);
            }

            $report['id_maps']['groups'][$oldId] = $newId;
            $report['groups_inserted']++;
        }
    }
}

function product_json_migrator_import_products(array $products, $mode, $dryRun, array &$report)
{
    foreach ($products as $product) {
        if (!is_array($product)) {
            continue;
        }

        $oldId = isset($product['id']) ? (int) $product['id'] : 0;
        $oldGroupId = isset($product['gid']) ? (int) $product['gid'] : 0;
        $name = trim((string) ($product['name'] ?? ''));

        if ($name === '') {
            $report['skipped'][] = 'Skipped product with empty name.';
            continue;
        }

        if (empty($report['id_maps']['groups'][$oldGroupId])) {
            $report['skipped'][] = 'Skipped product "' . $name . '" because its product group was not mapped.';
            continue;
        }

        $newGroupId = (int) $report['id_maps']['groups'][$oldGroupId];

        $existing = null;

        if ($mode === 'upsert') {
            $existing = Capsule::table('tblproducts')
                ->where('gid', $newGroupId)
                ->where('name', $name)
                ->first();
        }

        $product['gid'] = $newGroupId;

        $row = product_json_migrator_prepare_row('tblproducts', $product, ['id']);

        if ($existing) {
            $newId = (int) $existing->id;
            $report['id_maps']['products'][$oldId] = $newId;

            if (!$dryRun) {
                Capsule::table('tblproducts')
                    ->where('id', $newId)
                    ->update($row);
            }

            $report['products_updated']++;
        } else {
            if ($dryRun) {
                $newId = $oldId ?: -1;
            } else {
                $newId = (int) Capsule::table('tblproducts')
                    ->insertGetId($row);
            }

            $report['id_maps']['products'][$oldId] = $newId;
            $report['products_inserted']++;
        }
    }
}

function product_json_migrator_import_product_pricing(array $pricingRows, $dryRun, array &$report)
{
    foreach ($pricingRows as $pricing) {
        if (!is_array($pricing)) {
            continue;
        }

        $type = (string) ($pricing['type'] ?? '');

        if ($type !== 'product') {
            $report['skipped'][] = 'Skipped non-product pricing row.';
            continue;
        }

        $oldProductId = isset($pricing['relid']) ? (int) $pricing['relid'] : 0;

        if (empty($report['id_maps']['products'][$oldProductId])) {
            $report['skipped'][] = 'Skipped product pricing row because product ID ' . $oldProductId . ' was not mapped.';
            continue;
        }

        $newProductId = (int) $report['id_maps']['products'][$oldProductId];
        $currency = isset($pricing['currency']) ? (int) $pricing['currency'] : 0;

        if ($currency <= 0) {
            $report['skipped'][] = 'Skipped product pricing row with invalid currency.';
            continue;
        }

        $pricing['relid'] = $newProductId;
        $pricing['type'] = 'product';

        $row = product_json_migrator_prepare_row('tblpricing', $pricing, ['id']);

        $existing = Capsule::table('tblpricing')
            ->where('type', 'product')
            ->where('relid', $newProductId)
            ->where('currency', $currency)
            ->first();

        if ($existing) {
            if (!$dryRun) {
                Capsule::table('tblpricing')
                    ->where('id', (int) $existing->id)
                    ->update($row);
            }

            $report['product_pricing_updated']++;
        } else {
            if (!$dryRun) {
                Capsule::table('tblpricing')->insert($row);
            }

            $report['product_pricing_inserted']++;
        }
    }
}

function product_json_migrator_import_custom_fields(array $fields, $dryRun, array &$report)
{
    foreach ($fields as $field) {
        if (!is_array($field)) {
            continue;
        }

        $type = (string) ($field['type'] ?? '');

        if ($type !== 'product') {
            $report['skipped'][] = 'Skipped non-product custom field.';
            continue;
        }

        $oldProductId = isset($field['relid']) ? (int) $field['relid'] : 0;
        $fieldName = trim((string) ($field['fieldname'] ?? ''));

        if ($fieldName === '') {
            $report['skipped'][] = 'Skipped custom field with empty fieldname.';
            continue;
        }

        if (empty($report['id_maps']['products'][$oldProductId])) {
            $report['skipped'][] = 'Skipped custom field "' . $fieldName . '" because product ID ' . $oldProductId . ' was not mapped.';
            continue;
        }

        $newProductId = (int) $report['id_maps']['products'][$oldProductId];

        $field['relid'] = $newProductId;
        $field['type'] = 'product';

        $row = product_json_migrator_prepare_row('tblcustomfields', $field, ['id']);

        $existing = Capsule::table('tblcustomfields')
            ->where('type', 'product')
            ->where('relid', $newProductId)
            ->where('fieldname', $fieldName)
            ->first();

        if ($existing) {
            if (!$dryRun) {
                Capsule::table('tblcustomfields')
                    ->where('id', (int) $existing->id)
                    ->update($row);
            }

            $report['custom_fields_updated']++;
        } else {
            if (!$dryRun) {
                Capsule::table('tblcustomfields')->insert($row);
            }

            $report['custom_fields_inserted']++;
        }
    }
}

function product_json_migrator_import_config_groups(array $groups, $mode, $dryRun, array &$report)
{
    foreach ($groups as $group) {
        if (!is_array($group)) {
            continue;
        }

        $oldId = isset($group['id']) ? (int) $group['id'] : 0;
        $name = trim((string) ($group['name'] ?? ''));

        if ($name === '') {
            $report['skipped'][] = 'Skipped configurable option group with empty name.';
            continue;
        }

        $existing = null;

        if ($mode === 'upsert') {
            $existing = Capsule::table('tblproductconfiggroups')
                ->where('name', $name)
                ->first();
        }

        $row = product_json_migrator_prepare_row('tblproductconfiggroups', $group, ['id']);

        if ($existing) {
            $newId = (int) $existing->id;
            $report['id_maps']['config_groups'][$oldId] = $newId;

            if (!$dryRun) {
                Capsule::table('tblproductconfiggroups')
                    ->where('id', $newId)
                    ->update($row);
            }

            $report['config_groups_updated']++;
        } else {
            if ($dryRun) {
                $newId = $oldId ?: -1;
            } else {
                $newId = (int) Capsule::table('tblproductconfiggroups')
                    ->insertGetId($row);
            }

            $report['id_maps']['config_groups'][$oldId] = $newId;
            $report['config_groups_inserted']++;
        }
    }
}

function product_json_migrator_import_config_links(array $links, $dryRun, array &$report)
{
    foreach ($links as $link) {
        if (!is_array($link)) {
            continue;
        }

        $oldConfigGroupId = isset($link['gid']) ? (int) $link['gid'] : 0;
        $oldProductId = isset($link['pid']) ? (int) $link['pid'] : 0;

        if (empty($report['id_maps']['config_groups'][$oldConfigGroupId])) {
            $report['skipped'][] = 'Skipped configurable option link because configurable group ID ' . $oldConfigGroupId . ' was not mapped.';
            continue;
        }

        if (empty($report['id_maps']['products'][$oldProductId])) {
            $report['skipped'][] = 'Skipped configurable option link because product ID ' . $oldProductId . ' was not mapped.';
            continue;
        }

        $newConfigGroupId = (int) $report['id_maps']['config_groups'][$oldConfigGroupId];
        $newProductId = (int) $report['id_maps']['products'][$oldProductId];

        $existing = Capsule::table('tblproductconfiglinks')
            ->where('gid', $newConfigGroupId)
            ->where('pid', $newProductId)
            ->first();

        if ($existing) {
            $report['config_links_existing']++;
            continue;
        }

        if (!$dryRun) {
            Capsule::table('tblproductconfiglinks')->insert([
                'gid' => $newConfigGroupId,
                'pid' => $newProductId,
            ]);
        }

        $report['config_links_inserted']++;
    }
}

function product_json_migrator_import_config_options(array $options, $mode, $dryRun, array &$report)
{
    foreach ($options as $option) {
        if (!is_array($option)) {
            continue;
        }

        $oldId = isset($option['id']) ? (int) $option['id'] : 0;
        $oldConfigGroupId = isset($option['gid']) ? (int) $option['gid'] : 0;
        $optionName = trim((string) ($option['optionname'] ?? ''));

        if ($optionName === '') {
            $report['skipped'][] = 'Skipped configurable option with empty optionname.';
            continue;
        }

        if (empty($report['id_maps']['config_groups'][$oldConfigGroupId])) {
            $report['skipped'][] = 'Skipped configurable option "' . $optionName . '" because configurable group ID ' . $oldConfigGroupId . ' was not mapped.';
            continue;
        }

        $newConfigGroupId = (int) $report['id_maps']['config_groups'][$oldConfigGroupId];

        $existing = null;

        if ($mode === 'upsert') {
            $existing = Capsule::table('tblproductconfigoptions')
                ->where('gid', $newConfigGroupId)
                ->where('optionname', $optionName)
                ->first();
        }

        $option['gid'] = $newConfigGroupId;

        $row = product_json_migrator_prepare_row('tblproductconfigoptions', $option, ['id']);

        if ($existing) {
            $newId = (int) $existing->id;
            $report['id_maps']['config_options'][$oldId] = $newId;

            if (!$dryRun) {
                Capsule::table('tblproductconfigoptions')
                    ->where('id', $newId)
                    ->update($row);
            }

            $report['config_options_updated']++;
        } else {
            if ($dryRun) {
                $newId = $oldId ?: -1;
            } else {
                $newId = (int) Capsule::table('tblproductconfigoptions')
                    ->insertGetId($row);
            }

            $report['id_maps']['config_options'][$oldId] = $newId;
            $report['config_options_inserted']++;
        }
    }
}

function product_json_migrator_import_config_suboptions(array $subOptions, $mode, $dryRun, array &$report)
{
    foreach ($subOptions as $subOption) {
        if (!is_array($subOption)) {
            continue;
        }

        $oldId = isset($subOption['id']) ? (int) $subOption['id'] : 0;
        $oldConfigOptionId = isset($subOption['configid']) ? (int) $subOption['configid'] : 0;
        $optionName = trim((string) ($subOption['optionname'] ?? ''));

        if ($optionName === '') {
            $report['skipped'][] = 'Skipped configurable sub-option with empty optionname.';
            continue;
        }

        if (empty($report['id_maps']['config_options'][$oldConfigOptionId])) {
            $report['skipped'][] = 'Skipped configurable sub-option "' . $optionName . '" because configurable option ID ' . $oldConfigOptionId . ' was not mapped.';
            continue;
        }

        $newConfigOptionId = (int) $report['id_maps']['config_options'][$oldConfigOptionId];

        $existing = null;

        if ($mode === 'upsert') {
            $existing = Capsule::table('tblproductconfigoptionssub')
                ->where('configid', $newConfigOptionId)
                ->where('optionname', $optionName)
                ->first();
        }

        $subOption['configid'] = $newConfigOptionId;

        $row = product_json_migrator_prepare_row('tblproductconfigoptionssub', $subOption, ['id']);

        if ($existing) {
            $newId = (int) $existing->id;
            $report['id_maps']['config_suboptions'][$oldId] = $newId;

            if (!$dryRun) {
                Capsule::table('tblproductconfigoptionssub')
                    ->where('id', $newId)
                    ->update($row);
            }

            $report['config_suboptions_updated']++;
        } else {
            if ($dryRun) {
                $newId = $oldId ?: -1;
            } else {
                $newId = (int) Capsule::table('tblproductconfigoptionssub')
                    ->insertGetId($row);
            }

            $report['id_maps']['config_suboptions'][$oldId] = $newId;
            $report['config_suboptions_inserted']++;
        }
    }
}

function product_json_migrator_import_config_pricing(array $pricingRows, $dryRun, array &$report)
{
    foreach ($pricingRows as $pricing) {
        if (!is_array($pricing)) {
            continue;
        }

        $type = (string) ($pricing['type'] ?? '');

        if ($type !== 'configoptions') {
            $report['skipped'][] = 'Skipped non-configurable-option pricing row.';
            continue;
        }

        $oldSubOptionId = isset($pricing['relid']) ? (int) $pricing['relid'] : 0;

        if (empty($report['id_maps']['config_suboptions'][$oldSubOptionId])) {
            $report['skipped'][] = 'Skipped configurable option pricing row because sub-option ID ' . $oldSubOptionId . ' was not mapped.';
            continue;
        }

        $newSubOptionId = (int) $report['id_maps']['config_suboptions'][$oldSubOptionId];
        $currency = isset($pricing['currency']) ? (int) $pricing['currency'] : 0;

        if ($currency <= 0) {
            $report['skipped'][] = 'Skipped configurable option pricing row with invalid currency.';
            continue;
        }

        $pricing['relid'] = $newSubOptionId;
        $pricing['type'] = 'configoptions';

        $row = product_json_migrator_prepare_row('tblpricing', $pricing, ['id']);

        $existing = Capsule::table('tblpricing')
            ->where('type', 'configoptions')
            ->where('relid', $newSubOptionId)
            ->where('currency', $currency)
            ->first();

        if ($existing) {
            if (!$dryRun) {
                Capsule::table('tblpricing')
                    ->where('id', (int) $existing->id)
                    ->update($row);
            }

            $report['config_pricing_updated']++;
        } else {
            if (!$dryRun) {
                Capsule::table('tblpricing')->insert($row);
            }

            $report['config_pricing_inserted']++;
        }
    }
}

function product_json_migrator_render_import_report(array $report)
{
    ob_start();

    echo '<div class="alert alert-' . ($report['dry_run'] ? 'info' : 'success') . '">';
    echo '<strong>' . ($report['dry_run'] ? 'Dry Run Complete' : 'Import Complete') . '</strong><br>';
    echo 'Mode: ' . htmlspecialchars($report['mode'], ENT_QUOTES, 'UTF-8');
    echo '</div>';

    echo '<table class="table table-bordered table-striped">';
    echo '<thead><tr><th>Item</th><th>Inserted</th><th>Updated / Existing</th></tr></thead>';
    echo '<tbody>';

    echo '<tr><td>Product Groups</td><td>' . (int) $report['groups_inserted'] . '</td><td>' . (int) $report['groups_updated'] . '</td></tr>';
    echo '<tr><td>Products</td><td>' . (int) $report['products_inserted'] . '</td><td>' . (int) $report['products_updated'] . '</td></tr>';
    echo '<tr><td>Product Pricing Rows</td><td>' . (int) $report['product_pricing_inserted'] . '</td><td>' . (int) $report['product_pricing_updated'] . '</td></tr>';
    echo '<tr><td>Custom Fields</td><td>' . (int) $report['custom_fields_inserted'] . '</td><td>' . (int) $report['custom_fields_updated'] . '</td></tr>';

    echo '<tr><td>Configurable Option Groups</td><td>' . (int) $report['config_groups_inserted'] . '</td><td>' . (int) $report['config_groups_updated'] . '</td></tr>';
    echo '<tr><td>Configurable Option Links</td><td>' . (int) $report['config_links_inserted'] . '</td><td>' . (int) $report['config_links_existing'] . '</td></tr>';
    echo '<tr><td>Configurable Options</td><td>' . (int) $report['config_options_inserted'] . '</td><td>' . (int) $report['config_options_updated'] . '</td></tr>';
    echo '<tr><td>Configurable Option Sub-Options</td><td>' . (int) $report['config_suboptions_inserted'] . '</td><td>' . (int) $report['config_suboptions_updated'] . '</td></tr>';
    echo '<tr><td>Configurable Option Pricing Rows</td><td>' . (int) $report['config_pricing_inserted'] . '</td><td>' . (int) $report['config_pricing_updated'] . '</td></tr>';

    echo '</tbody>';
    echo '</table>';

    if (!empty($report['skipped'])) {
        echo '<div class="alert alert-warning">';
        echo '<strong>Skipped Items:</strong>';
        echo '<ul>';

        foreach ($report['skipped'] as $item) {
            echo '<li>' . htmlspecialchars($item, ENT_QUOTES, 'UTF-8') . '</li>';
        }

        echo '</ul>';
        echo '</div>';
    }

    return ob_get_clean();
}

function product_json_migrator_assert_tables()
{
    $tables = [
        'tblproductgroups',
        'tblproducts',
        'tblpricing',
        'tblcustomfields',
        'tblproductconfiggroups',
        'tblproductconfiglinks',
        'tblproductconfigoptions',
        'tblproductconfigoptionssub',
    ];

    foreach ($tables as $table) {
        if (!Capsule::schema()->hasTable($table)) {
            throw new RuntimeException('Required WHMCS table not found: ' . $table);
        }
    }
}

function product_json_migrator_prepare_row($table, array $row, array $exclude = [])
{
    $columns = product_json_migrator_table_columns($table);
    $allowed = array_flip($columns);

    foreach ($exclude as $column) {
        unset($allowed[$column]);
    }

    $prepared = [];

    foreach ($row as $key => $value) {
        if (isset($allowed[$key])) {
            $prepared[$key] = $value;
        }
    }

    return $prepared;
}

function product_json_migrator_table_columns($table)
{
    static $cache = [];

    if (!isset($cache[$table])) {
        $cache[$table] = Capsule::schema()->getColumnListing($table);
    }

    return $cache[$table];
}

function product_json_migrator_collection_to_array($collection)
{
    $rows = [];

    foreach ($collection as $item) {
        $rows[] = json_decode(json_encode($item), true);
    }

    return $rows;
}

function product_json_migrator_token_field()
{
    if (function_exists('generate_token')) {
        return generate_token('form');
    }

    return '';
}

function product_json_migrator_check_admin_token()
{
    if (function_exists('check_token')) {
        check_token('WHMCS.admin.default');
    }
}