<table cellspacing=0 cellpadding=4 border=0 width=100%>
<tr>
 <td height="10" colspan="2" align="center"><img src="images/q.gif" width="150" height="10" /></td>
</tr>
<tr>
	<th colspan=2 class=title_box>News</th>
</tr>
{section name=s loop=$news}
<tr><td>

<table cellspacing="0" border="0" width="100%" style=word-break:break-all>
			<tr><td class=adblack>
            <table cellpadding="3" width="100%" cellspacing="0" border="0" style=word-break:break-all>
             <tr>
              <td class={if $news[s].sponsored}smallnewsspons{else}smallnews{/if}>
                <span class=smallnewstitle>{$news[s].title}</span><br>
  <span class=smallnewstext>{$news[s].small_text}</span> <a href="?a=news#{$news[s].id}" class=smalllink>more</a>
              </td>
             </tr>			 
            </table>
            </td></tr>			
<tr>
<td background="images/shadow.gif" align="center"><span class=smallnewsdate>{$news[s].d}</span></td></tr>
</table>

 </td>
</tr>
{/section}
<tr>
 <td align="center"><a href="?a=news">All news</a>
 </td>
</tr>
</table>