

<p>
    You currently do not exchange any routes in any way with the following members of the exchange
    over the shown LAN(s) because:
</p>

<ul>
    <li> either you, they or both of you are not route server clients; and </li>
    <li> you do not have a bilateral (direct) peering session that we have detected with them. </li>
</ul>

{assign var=listOfCusts value=$potential}
{include file='peering-manager/index-table.tpl'}
