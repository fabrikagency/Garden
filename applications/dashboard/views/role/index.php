<?php if (!defined('APPLICATION')) exit();
$Advanced = C('Garden.Roles.Manage');
echo $this->Form->Open();
?>
<h1><?php echo T('Manage Roles & Permissions'); ?></h1>
<div class="Info"><?php echo T('Every user in your site is assigned to at least one role. Roles are used to determine what the users are allowed to do.'); ?></div>
<?php if ($Advanced) { ?>
<div class="FilterMenu"><?php echo Anchor('Add Role', 'dashboard/role/add', 'SmallButton'); ?></div>
<?php } ?>
<table border="0" cellpadding="0" cellspacing="0" class="AltColumns Sortable" id="RoleTable">
   <thead>
      <tr id="0">
         <th><?php echo T('Role'); ?></th>
         <th class="Alt"><?php echo T('Description'); ?></th>
      </tr>
   </thead>
   <tbody>
<?php
$Alt = FALSE;
foreach ($this->RoleData->Result() as $Role) {
   $Alt = $Alt ? FALSE : TRUE;
   ?>
   <tr id="<?php echo $Role->RoleID; ?>"<?php echo $Alt ? ' class="Alt"' : ''; ?>>
      <td class="Info">
         <strong><?php echo $Role->Name; ?></strong>
         <?php if ($Advanced) { ?>
         <div>
            <?php
            echo Anchor('Edit', '/role/edit/'.$Role->RoleID);
            if ($Role->Deletable) {
            ?>
            <span>|</span>
            <?php
            echo Anchor('Delete', '/role/delete/'.$Role->RoleID, 'Popup');
            }
            ?>
         </div>
         <?php } ?>
      </td>
      <td class="Alt"><?php echo $Role->Description; ?></td>
   </tr>
<?php } ?>
   </tbody>
</table>
<?php
echo $this->Form->Close();