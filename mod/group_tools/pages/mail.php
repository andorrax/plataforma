<?php
/**
 * Mail group members
 */

elgg_gatekeeper();

$group_guid = (int) get_input('group_guid', 0);

$group = get_entity($group_guid);
if (!($group instanceof ElggGroup) || !$group->canEdit()) {
	forward(REFERER);
}

elgg_require_js('group_tools/mail');

// set page owner
elgg_set_page_owner_guid($group->getGUID());
elgg_set_context('groups');

// set breadcrumb
elgg_push_breadcrumb(elgg_echo('groups'), 'groups/all');
elgg_push_breadcrumb($group->name, $group->getURL());
elgg_push_breadcrumb(elgg_echo('group_tools:menu:mail'));

// get members
$members = $group->getMembers([
	'limit' => false,
]);

// build page elements
$title_text = elgg_echo('group_tools:mail:title');
$title = elgg_view_title($title_text);

$form_vars = [
	'id' => 'group_tools_mail_form',
	'class' => 'elgg-form-alt',
];
$body_vars = [
	'entity' => $group,
	'members' => $members,
];
$form = elgg_view_form('group_tools/mail', $form_vars, $body_vars);

// build page
$body = elgg_view_layout('content', [
	'entity' => $group,
	'title' => $title_text,
	'content' => $form,
	'filter' => false
]);

// draw page
echo elgg_view_page($title_text, $body);

