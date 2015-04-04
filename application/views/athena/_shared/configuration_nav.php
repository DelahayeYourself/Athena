
<li class="dropdown-header">Utilisateurs</li>
<li class="divider"></li>
<li><a href="<?php echo Route::get('users')->uri(array('action' => 'lists', 'id' => 'etudiant')); ?>"><i class="fa fa-child"></i> Étudiants</a></li>
<li><a href="<?php echo Route::get('users')->uri(array('action' => 'lists', 'id' => 'admin')); ?>"><i class="fa fa-user-secret"></i> Administrateurs</a></li>
<li><a href="<?php echo Route::get('users')->uri(); ?>">Utilisateurs (For debug purpose)</a></li>

<li class="divider"></li>
<li class="dropdown-header">Générale</li>
<li class="divider"></li>
<li><a href="<?php echo Route::get('periodes')->uri(); ?>"><i class="fa fa-calendar"></i> Periodes</a></li>
<li><a href="<?php echo Route::get('mentions')->uri(); ?>"><i class="fa fa-graduation-cap"></i> Mentions</a></li>
<li><a href="<?php echo Route::get('specialites')->uri(); ?>"><i class="fa fa-flask"></i> Spécialités</a></li>
<li class="divider"></li>
<li><a href="<?php echo Route::get('parcours')->uri(); ?>"><i class="fa fa-map-marker"></i> Parcours</a></li>
<li><a href="<?php echo Route::get('modules')->uri(); ?>"><i class="fa fa-leanpub"></i> Modules</a></li>
<li><a href="<?php echo Route::get('groupes')->uri(); ?>"><i class="fa fa-users"></i> Groupes</a></li>
<li class="divider"></li>
<li><a href="#"><i class="fa fa-user"></i> One more separated link</a></li>