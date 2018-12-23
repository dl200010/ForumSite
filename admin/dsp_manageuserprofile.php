<?php
	/*
	 *  Copyright 2018 DL200010 <DL200010@gmail.com>
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
	include 'act_manageuserprofile.php';
?>
<header id="header">
	<h2>Manage User Profile Fields</h2>
</header>
<section>
	<form method="post">
		<div class="table-wrapper">
			<table>
				<thead>
					<tr>
						<th>Name</th>
						<th>Type</th>
					</tr>
				</thead>
				<tbody>
					<?php for($i=0;$i<$ProfileFormFields->num_rows;$i++) { ?>
						<tr>
							<td>
								<?php
									$row = $ProfileFormFields->fetch_assoc();
									echo "<input type='hidden' name='fieldid' vaue='{$row['profile_fields_PK']}' />";
									echo "<input type='text' name='fieldname_{$row['profile_fields_PK']}' id='fieldname_{$row['profile_fields_PK']}' value='{$row['name']}' />";
								?>
							</td>
							<td>
								<?php
									echo "<select name='fieldtype' id='fieldtype'>";
									foreach($flexaction['AllowedUserProfileFieldTypes'] as $item) {
										$selected = "";
										if ($item == $row['type']) {
											$selected = "selected=''";
										}
										if ($item != "") {
											echo "<option value='{$item}' {$selected}>{$item}</option>";
										}
									}
									echo "</select>";
								?>
							</td>
						</tr>
					<?php } ?>
					<tr>
						<td>
							<input type="text" name="newfieldname" id="newfieldname" value="" placeholder="New Field Name" />
						</td>
						<td>
							<select name="newfieldtype" id="newfieldtype">
								<?php
									foreach($flexaction['AllowedUserProfileFieldTypes'] as $item) {
										if ($item != "") {
											echo "<option value='{$item}'>{$item}</option>";
										}
									}
								?>
							</select>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="row">
			<div class="col-12">
				<ul class="actions">
					<li><input type="reset" value="Reset" /></li>
					<li><input type="submit" name="Save" value="Save" class="primary" /></li>
				</ul>
			</div>
		</div>
	</form>
</section>