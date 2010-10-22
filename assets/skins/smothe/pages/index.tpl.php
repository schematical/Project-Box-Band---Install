<?php SkinDriver::EvaluateHeader(); ?>
<table>
    <tr>
        <td>
            <p>
                I am the main info on the main page look at me, blah blah blahadsfasdfdas
                asdf
                dsf
                sadf
                s
            </p>
            <P>sdfadsfdasfdsfafdsafas</P>
        </td>
        <td>
            <?php SkinDriver::EvaluateComponent(Components::SIDEBAR); ?>
        </td>
   </tr>
</table>
<?php SkinDriver::EvaluateComponent(Components::PLAYBAR); ?>
<?php SkinDriver::EvaluateFooter(); ?>
