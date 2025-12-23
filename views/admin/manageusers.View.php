<?php
	/*
	 *  Copyright 2019 Christopher Dangerfield <DL200010@gmail.com>
	 *
	 *  Licensed under the Apache License, Version 2.0 (the "License");
	 *  you may not use this file except in compliance with the License.
	 *  You may obtain a copy of the License at
	 *
	 *      http://www.apache.org/licenses/LICENSE-2.0
	 *
	 *  Unless required by applicable law or agreed to in writing, software
	 *  distributed under the License is distributed on an "AS IS" BASIS,
	 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
	 *  See the License for the specific language governing permissions and
	 *  limitations under the License.
	 */
?>

<h2>Manage Users</h2>
<table class="table table-dark table-striped">
	<thead>
		<tr>
			<th>User</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<form method="post" id="ManageUsers">
				<td class="form-group">
					<input type="email" name="newuser" id="newuser" class="form-control" value="" placeholder="email" />
				</td>
				<td class="text-center">
					<input type="submit" name="Add" value="Add" class="btn btn-danger" />
				</td>
			</form>
		</tr>
		<?php for($i=0;$i<$flexaction['model']['Users']->num_rows;$i++) { ?>
			<tr>
				<td>
					<?php
						$row = $flexaction['model']['Users']->fetch_assoc();
						echo $row['email'];
					?>
				</td>
				<td class="text-center">
					<input type="submit" name="Edit" value="Edit" class="btn btn-danger" id="<?php echo $row['Users_PK']; ?>" />
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>

