{assign var=foo value=[0,1,2,3,4,5,6,7,8,9]}{section name=bar loop=$foo start=$i}{$foo[bar]}{sectionelse} else {/section}