<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$lang['admin/transition.overview.title'] = 'Transitioning members';
$lang['admin/transition.overview.member.minwidth'] = '10px';
$lang['admin/transition.overview.season.minwidth'] = '10px';
$lang['admin/transition.overview.state.minwidth'] = '10px';
$lang['admin/transition.overview.fee.minwidth'] = '10px';
$lang['admin/transition.overview.minfee.minwidth'] = '10px';
$lang['admin/transition.overview.name.format'] = '%1$s %2$s';
$lang['admin/transition.overview.button.start_new_season'] = 'Start new season';

$lang['admin/transition.created.title'] = 'Transitions created';
$lang['admin/transition.created.success.multiple.format'] = '%s transitions were created.';
$lang['admin/transition.created.success.one'] = '1 transition was created.';
$lang['admin/transition.created.failure'] = 'No transitions were created. Possibly the transitions were already created or the current season is incorrectly configured.';
$lang['admin/transition.created.to_overview'] = 'To the overview';

$lang['admin/transition.properties.member'] = 'Member';
$lang['admin/transition.properties.season'] = 'Season';
$lang['admin/transition.properties.state'] = 'Status';
$lang['admin/transition.properties.fee'] = 'Fee';
$lang['admin/transition.properties.minfee'] = 'Minimum fee';

$lang['admin/transition.states.names.created'] = 'Created';
$lang['admin/transition.states.names.initiated'] = 'Initiated';
$lang['admin/transition.states.names.active'] = 'Active';
$lang['admin/transition.states.names.completed'] = 'Completed';
$lang['admin/transition.states.names.archived'] = 'Archived';

$lang['admin/transition.states.description.created'] = 'The transition has been created.';
$lang['admin/transition.states.description.initiated'] = 'The documents for the transition have been created and the mails can be sent.';
$lang['admin/transition.states.description.active'] = 'The mails have been sent en we are waiting for the member to take action.';
$lang['admin/transition.states.description.completed'] = 'The transition has been completed.';
$lang['admin/transition.states.description.archived'] = 'The transition has been archived.';