<center>
{if $rows}
	{foreach from=$rows item=row}
		----------------------------------------------------------------------------------------------------------------
		<br />
		<a href="http://cold-storm.com/profile/{$row['user_id']}">{$row['nickname']}</a>
		<br />
		{htmlspecialchars($row['details'])}
		<br />
		----------------------------------------------------------------------------------------------------------------
		<br />
	{/foreach}
{else}
	No suggestions found! Submit one!
{/if}
</center>
