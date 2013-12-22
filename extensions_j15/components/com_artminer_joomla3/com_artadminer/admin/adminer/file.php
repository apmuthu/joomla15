<?php
/** Adminer - Compact database management
* @link http://www.adminer.org/
* @author Jakub Vrana, http://www.vrana.cz/
* @copyright 2007 Jakub Vrana
* @license http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
*/


error_reporting(6135); // errors and warnings
if(!defined('MyAdminerConst')) {
   die('Direct access not permitted');
}


// disable filter.default
$filter = !ereg('^(unsafe_raw)?$', ini_get("filter.default"));
if ($filter || ini_get("filter.default_flags")) {
	foreach (array('_GET', '_POST', '_COOKIE', '_SERVER') as $val) {
		$unsafe = filter_input_array(constant("INPUT$val"), FILTER_UNSAFE_RAW);
		if ($unsafe) {
			$$val = $unsafe;
		}
	}
}

if (function_exists("mb_internal_encoding")) {
	mb_internal_encoding("8bit");
}

// used only in compiled file
if (isset($_GET["file"])) {
	
if ($_SERVER["HTTP_IF_MODIFIED_SINCE"]) {
	header("HTTP/1.1 304 Not Modified");
	exit;
}

header("Expires: " . gmdate("D, d M Y H:i:s", time() + 365*24*60*60) . " GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

if ($_GET["file"] == "favicon.ico") {
	header("Content-Type: image/x-icon");
	echo lzw_decompress("\0\0\0` \0�\0\n @\0�C��\"\0`E�Q����?�tvM'�Jd�d\\�b0\0�\"��fӈ��s5����A�XPaJ�0���8�#R�T��z`�#.��c�X��Ȁ?�-\0�Im?�.�M��\0ȯ(̉��/(%�\0");
} elseif ($_GET["file"] == "default.css") {
	header("Content-Type: text/css; charset=utf-8");
	echo lzw_decompress("\n1̇�ٌ�l7��B1�4vb0��fs���n2B�ѱ٘�n:�#(�b.\rDc)��a7E����l�ñ��i1̎s���-4��f�	��i7������Fé��a�'3I��d��!S��:4�+Md�g���ǃ���t��c������b{�H(Ɠєt1�)t�}F�p0��8�\\82�DL>�9`'C��ۗ889�� �xQ��\0�e4��Qʘl��P��V��b���T4�\\�W/����\n��` 7\"h�q��4ZM6�T�\r�r\\��C{h�7\r�x67���J��2.3��9�K��H�,�!m�Ɔo\$�.[\r&�#\$�<��f�)�Z�\0=�r��9��jΪJ��0�c,|�=�������Rs_6��ݷ������Z6�2B�p\\-�1s2��>�� X:\rܺ��3�b����-8SL����K.��-�ҥ\rH@ml�:��;�����J�0LR�2�!���A��2�	m���0eI��-:U\r��9��MWL�0��GcJv2(��F9�`�<�J�7+˚~���}DJ��HW�SN���e�u]1̥(O�LЪ<l��R[u&��H�3�v��U�t6��\$�6���X\"�<��}:O��<3x�O�8��>����C���1����HR��S�d�9��%�U1�Sn�a|.�ԁ`�8���:#���C�2��*[o��4X~�7j�\\���6/�09�\r�;��;V��n�n���މv��k�HB%�.k\">��[�\n���l��p�9�cFZ�s��|�>6 �5�l1V��ΐ�6����7��:�\"Az��de���\\�5*�մ��]�p[*�Am)Kt[�\n8g=;���2z���|���̣4�t8.���N#�ʲ��B\"�9���%���HQw�qd��F����\$&V��Q#�Q'��_�m�̡�� ���\r��h� Xrt0j5����W���4���ד�m����\"CA�F!�엖h>�b0�0�7;8�4Ka���	\0�p	a���HXF��1:�8�U9H��Ió�;�sQ�7F��cLpXM@e�����吞+g(��73O�3p��b�lEE>�Chb%�D�I8��E'�	#)�=%C��j�Y�1��y�h;cA��6�jK�\r���9�\$|������g-Z�o�\0���z���\$+D���V�w*�W��p�J���\\��F�O�'ɲa1�m,_ڧ\r��1�P�o�;\0�5����e\r& 3��^\r��6�MR2T\0���5?~�5����P>�85h��n�1;��\rRL8`�\\��@��`;z\n�\0�ԃ8��9R�yZP@�ib�?ƭv\$�<�%	A\r�?�\0�Sʥ��� �BÞ4JҨ��:�`#Hi�7ε�+}���v���o�J��Vڰ���9���W�2�Q�\r�T�D`��f�� ��w�L�����I]MKd7*rk*j\nAS��jF��-[ezz�r��ʁfU�3��~\\��Z��Z��{)��>>Ѓp���*����;zDb�w��]�mC\n���訓�KB��B���m@�����ִ>�����wU�*N�(ba�ƶ�@f�v�)��`�\0u�D)mD@/4����9j��������HBm1��I��5D��RuE��9��Aӗ=1b�0��e�y��1��s�;��������-�����]s��5�\\��\n1;���Q�^��b��i�;YJ2�d!s����#�kg�hށ]�W)>V��I�x]�r���;6�JLcpr��d{py�M��-�UVH�5'\nt��в�l���pH���o�e�Z�Ϩ��q�e��X�F�`Gy\r�!�Ww*����D��u�t%���d�Q��/�p�:�ih���t&���P��e,J͌��t�!�O�7��6�GgR���C[��sk�vqU�}y�h�AGV�����|�lF�ޅL^�.��]u&w�!��[jn��n��ڏ[k�C��v����k�rmOɭ��J>��WT�0����\n�pM�C����b�t��VG|oy8�����c�����");
} elseif ($_GET["file"] == "functions.js") {
	header("Content-Type: text/javascript; charset=utf-8");
	echo lzw_decompress("f:��gCI��\n:��sa�Pi2\nOgc	�e6L����e7�s)Ћ\r��HG�I���3a��s'c��D�i6�N�����2H��8�uF�R�#����r7�#��v}�@��`Q��o5�a�I��,2O'8�R-q:P��S�(�a��*w�(��%��p�<F)�nx8�zA\"�Z-C�e�V'������s��q��;NF�1䭲9��G�ͦ'0�\r���ȿ�9n`�р�X1�݁G3��t�ee9��:Ne��N��OS�z�c��zl�`5����	�3��y��8.�\r���P��\r�@����\\1\r� �\0�@2j8ؗ=.��� -r�á��0���Q�ꊺh�b����`����^9�q�E!� �7)#���*��Q���\0���1���\"�h�>��������-C \"��X��S`\\���F֬h8�����3��`X:O�,�����)�8��<B�NЃ;>9�8��c�<�#0L����9���?�(�R�#�e=���\n���:*��0�D��9C���@��{ZO����8��i�oV�v�k�Ar�8&����..��cH�E�>�H_h����WU�5��1�r*����^�(�b�xܡY1���&XH�6�ؓ.9�x�P�\r.`v4�������8�4daXV�6�F���E�HH�fc-^=���t��x�Y\r�%��xe���Q�,X=1!�sv�j�kQ2��%�W?��Ů���=�dY&ٓ�VX4�ـ�\\�5���Xì!�}��N�gvڃWY*�Q��i&��l��ѵZ#����Ց\rA�\$e�v5o#ޛ�����5gc3MTC�L>v�H������<`���*�]�_��;%�;��V��i�����4X��'��`����i�j0g�O��ۥ�i���9�ƙےd�F���k/lŞ��n��c<b\n��8�`�H��e�}]\$Ҳ��� �!����C)�\$ ��A��`�\0'���&\0B�!�)���5E)�����o\r��8r`���!2�T��s=�D˩�>\n/�l�����[��ŠP��a�8%���!�1v/��SUcoJ�:�4J+�B���v�J��\r���b{��,|\0��z��c���Y��l�\n��i.��!��)��dm�J����!'��� B\nC\\i\$J�\"���2�+�IkJ���\$����G�y\$#ܲi/�CAb��b�C(�:��UX���2&	�, Q;~/��Ky9��?�\r6��tV���!�6�CP�	hY�E�������l�䏞(ؖT��p'3��C<�dc���?�yC���e0�@&A?�=��%�A:JD&SQ��6R�)A���b`0�@��u9(�!0R\n�F ��� �wC\\����υr��ܙ��#�~��2'\$� :��K�`h��@��Eb�[�~���� T��lf5��BR]�{\"-��\0��L>\r�\$@�\n(&\r��9�\0vh*ɇ��*�X�!_dj�����py������`�jY�wJ�\$�R��(uaM+��n�xs�pU^�Ap`ͤI�H�\n�f�02�)!4a�9	����EwC�����˩ �L�P����Ai�)�p�3�A�u����AI�A�Hu	�!g͕�U����ZU���c�*����M��xf�:��^�Xp+�V�����K�C#+� �Wh�CP!���;�[pn\\%��k\0����,ڨ8�7�xQC\nY\r�b��XvC d\nA�;��lF,_wr�4RP���HA�!�;��&^Ͳ��\"6;����=�#C�I���9f�'�:��DY!��B+�s�xV��8l�Ó�\"�鑃�H�U%\"Z6��u\r�e0[��p���a��.��� +^`�`b�5#CM�\$� �I��˚A�P�5C\r� S�d�WN6H[�SR�����\\+�X�=k��λ׺��S����r^(��oo�7����\\huk�lHaC(m����nRB��Uup��2C1�[�|ٽ�beG0��\"�CG��?\$x7��n��\$Z�=�ZӦ��si5�f��&�,�f�hi�I�y��n�2�0��DvE��T�x��M�{��`ܤ�GN#遂Z,�/�R\$�#\\I-	����|�0�-0��N�P�����;s-�v���҆���nwGt�n����di�H�|��4�(��+�v��&�Ņ�+K����L\nJ\$ԩ����:\\Q<WB\"^���WTIB~��q�ɞ��}�3�ο\":�U����|\r5n(n����� �7��O�D}B}�����\0\r�voܕ���؆_Jl�İ�H3�\"�[ĸ���K�A��`ߖ���N���&(�)\"� f�&�\0�� b��l��F�.jr����J�\"P<\$F�*�|f/�! �O��pR ���F#5g�b���8eRDi��0�P�+*�������k�Z;�pHh��l!�\0\r\nc�o�/��CB�<py�NTH�h�T�	�@��px�\$������48\n��#�NU,���\$P�m��YK��\"H�� �R�L�����D�\0����a�W�`p�����g���lP����o�:L���+\0 ]0�<)��N�xk\n(`c�+r�k{m\"�3.0��H1�e*ZoeB���9\r���\0RLi�Q�U�ԋ`��.����o:�d���T7Q��V ��Dh��W��S1�	��g�*2��,�W)��@�ϰT@C	Q(�,��4�#d<��\0�! �\$��2 {es��+�rʫ����JvY*�HPr\r����T�M\\\\`���v���<�&�n�D\\HH�oj^@��	��<񊆯��8��*#f�*��\r\nT� \\\r��*�T�^*��ɠ�\$�6o�7��Ree8� �粡,ҥ,�,`|9��K2�0r�+ҧ1R��\"� �*�P*��ȆM\\\rb�0\0�Y\"�\"�Ux���`������Q�E\r�~Q@5 �5sZ�^f�R@Q4�d��5�b\0�@�F�b/�8\"	8s�8�<@����l2\$Sh���\n�R\"U�43FNɫ7\"D\r�4�OI3\n\0�\n`�``��� Y2��ob�3��<n6�]<`��\"�� N�\"B2�Z\n��m���E�����\0����Zx�[2�@,��<P�?�\r�8#d<@��JU��K/E�;\$�6��S�DU	l;�,U�LΒ�7fcG\"EG��\$��\"E��3FHƤI���d�=e	!�UHБ23&j�Ȭ�*��%%�%2�,��JQ1H�l0tY3��\$X<C�t�4�_\$\0��>/F�\n�?mF�j�3�p�D��HK�v Ⱥɜ�\0X�*\rʚ��\n0��e\n�%��\ri���O��fl�N��M%]U�Q�Q�L�-��S±T4�!��U5�T\nn�di0#�E��M����i�.��/U���\rZF���j���;���H�☎d`m�ݩ���\n�t��QS	e��|�i����Qt� d�12,���DY�1UQSU��cd����E�)\\����L�	�F\$�@��V�{W6\"LlT��A�\$6ab�O��dr��Lp�c,��esΞ�<2�`�@b�XP\$3�����@˃P,�K�Vխ^����M��L���u�1��@�c��t-�(���`\0�9�n��2sb���/ �Fm�)���Hl5�@�n�l\$�q+�:��/ ���d��,��\n�޵�����.4���\$ �w0\$�d�V0���\"��r��W4678�VtqBau�pÀ�I<\$#�x`�wd�9�^*k�u�ofBEp	g2���f4 ��L!�r=�\0��\"	�\r<��h�������U�%T�h��Bk�#>�'C�p\n��	(�\r��2����\"3�l��Mԋ7�G�x.�,�Uu�%Dt� �w�y^�Mf\" �����(vU�3�u��J^HC_IU�YkS���c_ylc�c]rF���_q�%�W#]@�r�kv�3-�cy��VHJG<�Z��T�@V�8�\$�6�o�2H@�\r��ª\0��=�ݍ���\"3�9z��:K����u��K >����B\$�r�.�J��<K�G~�P�X��QMƹ	X��w\$;��mp�Zp�� �cK!OeOO�?�wp��懤�֠��L��I\n��?9xB�.]O:V����9��.�mW�\0˗s>�*�l'���k��o�ph���x�����v�L`w�1��� ��!�M�4\"�I\$��\"o�\$��>˙Bea\"��D�Bo�ʶ�+� B0Pxp��&��7�|p{|��}7ְ�\$-P�����@b����e����VYmoM�o�\0���Nzn*>�΄�)�����-H�l!����hp�g�� ����&tZ�㜤\0�!��8 ɩ���ZK��@DZG��������F�秩.� ��l��z%��(�x�}��'<��Ū(������<�XZǬ��њ� ɮg�����w��z�z{�e�'{;@噱(&���R�^E�ݛx�宛Y��\"���Mܒ��V��\n�5�zl�zr�[x��˪�����G\$O�W�@����Z�x�����,����be�� 	�f�dƻ�2��EË��I�D�YT�%�k�{�J�\\\r�U N �'�_��ɽ�f|w޵����,�l�7�kt�1R�D>�ЋX�Z��Њ�|y|Z{|�բ��\r��%;�#\0eZ,\rKt\r�>��>\$�>��?�?c�?�+��@�� ���@ʰ���c�q�fc��+�3Ș���؀&x�]�N���*|��b2<lnT��\$�A���Z0.��&��˷��`{�p,�@��&|��ϖ.��.oo��@����1=\$9{��dB;���ה#�:��\$@wң�=���C?� �(�?Ӄ� �G1�|�\"]�\0���5�\0Ej\r��@@*�2KL�#d*��CA�3,K`� ����C��ϭ�������]��\r�L9۝��=<��]�(�jC�) �,���Bf\r��� �-�Rd5��\$\0^�\n4�\0�ڢ��SY�܆�k���4��@�B\0���W��?x(���u}��ڠ�����K~P\r���/�E\"���#��>R�_���\$< ��\r�l�[����*�`�\n����~��b���]���j�B\r�qˣQ꾼+�(�W|���+�ep9�j}R<�w@���db̴�����Qդ��̀�/(稦m��I_�}U<��ո�ЗBy�����_�f�&F͌��F.} zh��y���Fc���rU۫Fq���:�\n��\n%���`��D@�{��������s/wh]Bz\"J��#���f������TC�����_��dZؠ�֣m2n�nC��K�G\\9(�B�o�� ���S�#��|���d)E��ހ�|��,��bg�1�N�1u�P91�\0��T\0�<�p>iJ����6p\r-���S0�t��HJ�`�7Dc���p)�\nߢ\\����%�a���Q�� �C�f���������6\n�e���\n>�@%h�%I	�`�\0�uAX�K��	`�8+��I\\(�\rń�\0�l�H#]*y\$���,H�?E�F�C7�`țE@rG�p�LB3H,�0�+�s\r\0�\0�!�9�Hua4��� �0�aJ�(�\0��Dq�g��aJ!��m~A�a&à�/ *p��\"�I��BD�\r!�9!v�L�:��Ċ�!\$��A�K����e��\0�l�b	i��6%�YzKrlRK�\"AF{ 6��XH�&�:h~��9��_�2Ws>���\$�Ћ���� ���p�C@vz�0����և8��\\�v���p:s_\\��:��Y\rB����\$|���i�G���R#�	YR9�\0D28?��+}Y���ᩇJ#�C�iV�CT6�Q9���pite�L��p\$�4�\$D#�@@��<A��Pܑ��\0�f�!����а�)B2YZ\0�.���S��(����.� 4b1�H��`س�Y)��R�Ă����`1�g����H:B]�O#8�K���\n�jD%C*I\$Ai���N,�0	 K(\0�T��`\n2OB7����4Q�CH	��4@��� )\$\0	�Jq���+��K�e��&.�J'p�=p��Q�����[xXb� <E�'D�#���`3����60@@�ڦ�� `|�R쀾�5��.�� ����?#?�lS\"!�jE��q�\0�� ���Q���\r�T#<����?1��(HB��FL��[|�@LE�܆�&Q�:yĎ���Fh4q�����U���\"!C1��FJ8#@��f:dё8#2C�8�2.\$�Cb��|\$�0���r�I\0��,��00�K�e!�N��i@d|�5��h`��	T��U2Nj��i��0�Udk��*&j�F8*�E����zcά��Ηs���Â�5��7�\n\r��U�,�2�`�� @�����@X��*�p:-,\rRZ�L�,ʃ|���l�^�O�0�	BC��R�n���V���� ��T�]�Mr�����#���y�\\\"y�\$���/ r*h��%�1�K����ρ|R`b�B�8�r�1��n\0��		�\r�U8�l�tB��(����\0003:����%��-|�\0�eTH\"H�q4(�N\\jc������T�H\n�\0��m�3�?1S:>|g���Rc������\r�F8Q&�@5r\0��XV�5�\\�f�h@v,����/\0\n&�/!��dq��KR����m;�aD2���d\0002��b\$	�L�/1��,�E�4���@<�}aی�\$��1*���`�>0� :��d 	-	Ä\rD�Yl(6[6�k�sf��' 8I��T�JDUD:A�2�hd\0a\0����)2�:��B3:����Z1=���@�-qN\\!�\$�k�f���N�w	������`�n\$L�CR�����5�pc�E3Ca��\0=�Hjڒg����-ژ�E�e�.\0�!o�,�'�w�I`\\s6�R��E�}e0F\\��m�|F>q ?jД�6i��p	��+�N���������9��qu��p�2eɑ��m�.�+L~\$\"���R�s]i��qC�И<T(i��یQ��bt�\"��N�B��mư�@r���xMM�q�#Oj /	 L�D�K�.��t0tI�eB��j��1���6�0~s�74�bQ�Q�!�2��Ԗ��Ǽ�D��H��2��P��d�mM�� DֈF�fȹ\r�Dj\$��L�[\0�`����<@m�V~9� v�4��=!����2�ْ�6�'��*D������#��\0��{��'�2�lLR�J����ўX�ë,E�(C�\\�G����;/�����R�\$��d��\$�QJ`τ!Ү��K�\n|�9�T�dx�@�h!'���E��-�v}b�;|cfL�����YARO�ڇ|3�Eg�zQf�@�l��/i����o�E�ŗgo^q�\nAaΔg˰!��@�R��4��1lE!�p��H0�jb��q�A��a�@xT���ݙ\0\r�F����45H�Zm=�x�F�C̙���v?C��L�2�}hfX��\$`I��b�\0ĭ7�G��Dũ�βfP9U��`\"�����\r���IjԍʶT�\rUz��*��T��!CI`���X2 �Q��k#ԅ\ne�e�+[l~:��~�hn	�h�'͙ΧUV���N�WL��ՋQ=)nI�������҄�^Y���pU�O�AXZ�U�����S�����\\��@Cr�\"���̈́;�^E��-�x\r��\\�P������v!I:Z	�\\�_�2CP�tWY��̰ �_]�a+�=s���]�uC-h�* ���Һ	{���+�Z���D\$�c\$-v�B�P�.���s¤�2�R��j[Z�/Q�Q:����1Y�+ھ�ھ�!�S�b���9�Zy���b,�t0��f=@�\r�-��\nB-ɟ0�&2_�9����hM,ב2�H�oT���lbd����� \0�[�\"�%A־�4;2͒d.��˗H�Zb545H�\\�ʓT��A������RBʄ֤�-��l��Jsύ�6\"� Ȃk=������<�>��jZg�x`�6��t�.���b,�ͩ��k��Y�\\`'��Sl�jհ!ln���\0Wg+:+�c6~����KF�ʖĩ-���h9-��H@SD�G�;�Π���_��	\n�)��fn���Q�-*�C֩��{�MSnZED\0)��Pg]���6���b%�%���Hj&%-* 9}�j43@�*(m�\$QD��ۆ��ҹ(��m¼ukjO�\" ,1����Vv�%s�1k�P�`�	���/�@��0>F�>#��X��8%�lⴹK��S|�Yw0u̧bÉ�X4p\0\n�������%�\0Z�Q2W�WE�k��oɇ�j�y�	�.Z\0�	Pp�t�H���R�>��,%)�k����`|��,prZ�h���Z,P���|���CFL�x�n�� ���.���PRe��V�oB;xD���k�)�M?n�`��/�5Il�qh\0�צ�5Eh�q�폴���A�ˉU��d��kD��Oy;���Ɔ�ë�A.Or�Ƅ�!��H��^ҋD3�I��g��>���c��e~��Z�o������n�_^�+��!��h�|*3ޢ�G���[�n����ڶ�j��p�����7H�/��T��+��3��lP{<2���ʞЩ�)\"ãލ���Yˣ�A2��:���&\0ۃ~cK���\n��D�4�GN�g.`�RB1�H.j�{��}n�|���/��o�����`]��f_6�y`�\r x^@����\\R�=�'ς��_{X-���\\)L�E��������P��l\\\0]��hareӝ8�N����G^��I:����ܵ�J%r�~�-܍	1�g��+gV�oσ�zm��>54�)�m���m�\$o�Eb����ܒ)m�E�Ѩ���K6!*\n��Ӕq�	��0?��w��PK��g�1�i��~X`\0X��Y�	�Z *Dh���1E�l�����\r\0:?\r>��#2�@�3�h2��袰��Æ&��O�е.�Ʉ��(.L<r����K�#���@A��[,L�5�4��<!�r���,��YI�H��d)+l�\$U\\|���'��ݣT���\0�'���\$�;\0����Q��w�ֹ~⌴0qt^2y�����L.����a{�(�!��*\0i~?9�ÄG�l2�3�v4�?f[r�Ԇ;A�Yn��)�� �&���P�2D@���� �]�w�K2�x� .�p��[4�u6�(�} J3�\0x\\�T\\)!�>bV����Eь�s���:��8�8{�>χ�A�o��Hry�����S�d�vm�r׃f���>jO�\n�À�5��ֳ͂A�0���0�2�>n����f����16q3���]+�a�r�F��x6	S-3e�+�x��̤��/j�hD\r��-\n�ј��G7����z2i���.�A9��f`�Y��T�x�9���\"^\\�n���ݣs�9������{0s�83�\$�:#��3��Y�6�{0�\n�J\$�#D�\\�ļ�����@�Ў�3u�0��\"*��.rs���؛�����5����G_ȎD�dH�Km]���\\4\0;d}��[S2ܜ����}ޞ���Kd�& t�rf	*j�+�Px��܍\r��7�M8A�[#��m��\n�\n𧀯9��+�Z���H�|H[��_�ź�|���j5H�|���U1��^�u]��P L`X�gh �_r���s�m�Z:l]ih�s�K��>����e�c9��p7�j�C��L���Rp``�������");
} else {
	header("Content-Type: image/gif");
	switch ($_GET["file"]) {
		case "plus.gif": echo "GIF87a\0\0�\0\0���\0\0\0���\0\0\0,\0\0\0\0\0\0\0!�����M��*)�o��) q��e���#��L�\0;"; break;
		case "cross.gif": echo "GIF87a\0\0�\0\0���\0\0\0���\0\0\0,\0\0\0\0\0\0\0#�����#\na�Fo~y�.�_wa��1�J�G�L�6]\0\0;"; break;
		case "up.gif": echo "GIF87a\0\0�\0\0���\0\0\0���\0\0\0,\0\0\0\0\0\0\0 �����MQN\n�}��a8�y�aŶ�\0��\0;"; break;
		case "down.gif": echo "GIF87a\0\0�\0\0���\0\0\0���\0\0\0,\0\0\0\0\0\0\0 �����M��*)�[W�\\��L&ٜƶ�\0��\0;"; break;
		case "arrow.gif": echo "GIF89a\0\n\0�\0\0������!�\0\0\0,\0\0\0\0\0\n\0\0�i������Ӳ޻\0\0;"; break;
	}
}
exit;

}


/** Get database connection
* @return Min_DB
*/
function connection() {
	// can be used in customization, $connection is minified
	global $connection;
	return $connection;
}

/** Get Adminer object
* @return Adminer
*/
function adminer() {
	global $adminer;
	return $adminer;
}

/** Unescape database identifier
* @param string text inside ``
* @return string
*/
function idf_unescape($idf) {
	$last = substr($idf, -1);
	return str_replace($last . $last, $last, substr($idf, 1, -1));
}

/** Escape string to use inside ''
* @param string
* @return string
*/
function escape_string($val) {
	return substr(q($val), 1, -1);
}

/** Disable magic_quotes_gpc
* @param array e.g. (&$_GET, &$_POST, &$_COOKIE)
* @param bool whether to leave values as is
* @return null modified in place
*/
function remove_slashes($process, $filter = false) {
	if (get_magic_quotes_gpc()) {
		while (list($key, $val) = each($process)) {
			foreach ($val as $k => $v) {
				unset($process[$key][$k]);
				if (is_array($v)) {
					$process[$key][stripslashes($k)] = $v;
					$process[] = &$process[$key][stripslashes($k)];
				} else {
					$process[$key][stripslashes($k)] = ($filter ? $v : stripslashes($v));
				}
			}
		}
	}
}

/** Escape or unescape string to use inside form []
* @param string
* @param bool
* @return string
*/
function bracket_escape($idf, $back = false) {
	// escape brackets inside name="x[]"
	static $trans = array(':' => ':1', ']' => ':2', '[' => ':3');
	return strtr($idf, ($back ? array_flip($trans) : $trans));
}

/** Escape for HTML
* @param string
* @return string
*/
function h($string) {
	return htmlspecialchars(str_replace("\0", "", $string), ENT_QUOTES);
}

/** Escape for TD
* @param string
* @return string
*/
function nbsp($string) {
	return (trim($string) != "" ? h($string) : "&nbsp;");
}

/** Convert \n to <br>
* @param string
* @return string
*/
function nl_br($string) {
	return str_replace("\n", "<br>", $string); // nl2br() uses XHTML before PHP 5.3
}

/** Generate HTML checkbox
* @param string
* @param string
* @param bool
* @param string
* @param string
* @param string
* @return string
*/
function checkbox($name, $value, $checked, $label = "", $onclick = "", $class = "") {
	$return = "<input type='checkbox' name='$name' value='" . h($value) . "'"
		. ($checked ? " checked" : "")
		. ($onclick ? ' onclick="' . h($onclick) . '"' : '')
		. ">"
	;
	return ($label != "" || $class ? "<label" . ($class ? " class='$class'" : "") . ">$return" . h($label) . "</label>" : $return);
}

/** Generate list of HTML options
* @param array array of strings or arrays (creates optgroup)
* @param mixed
* @param bool always use array keys for value="", otherwise only string keys are used
* @return string
*/
function optionlist($options, $selected = null, $use_keys = false) {
	$return = "";
	foreach ($options as $k => $v) {
		$opts = array($k => $v);
		if (is_array($v)) {
			$return .= '<optgroup label="' . h($k) . '">';
			$opts = $v;
		}
		foreach ($opts as $key => $val) {
			$return .= '<option' . ($use_keys || is_string($key) ? ' value="' . h($key) . '"' : '') . (($use_keys || is_string($key) ? (string) $key : $val) === $selected ? ' selected' : '') . '>' . h($val);
		}
		if (is_array($v)) {
			$return .= '</optgroup>';
		}
	}
	return $return;
}

/** Generate HTML radio list
* @param string
* @param array
* @param string
* @param string true for no onchange, false for radio
* @return string
*/
function html_select($name, $options, $value = "", $onchange = true) {
	if ($onchange) {
		return "<select name='" . h($name) . "'" . (is_string($onchange) ? ' onchange="' . h($onchange) . '"' : "") . ">" . optionlist($options, $value) . "</select>";
	}
	$return = "";
	foreach ($options as $key => $val) {
		$return .= "<label><input type='radio' name='" . h($name) . "' value='" . h($key) . "'" . ($key == $value ? " checked" : "") . ">" . h($val) . "</label>";
	}
	return $return;
}

/** Get onclick confirmation
* @param string JavaScript expression
* @return string
*/
function confirm($count = "") {
	return " onclick=\"return confirm('" . lang(0) . ($count ? " (' + $count + ')" : "") . "');\"";
}

/** Print header for hidden fieldset (close by </div></fieldset>)
* @param string
* @param string
* @param bool
* @param string
* @return null
*/
function print_fieldset($id, $legend, $visible = false, $onclick = "") {
	echo "<fieldset><legend><a href='#fieldset-$id' onclick=\"" . h($onclick) . "return !toggle('fieldset-$id');\">$legend</a></legend><div id='fieldset-$id'" . ($visible ? "" : " class='hidden'") . ">\n";
}

/** Return class='active' if $bold is true
* @param bool
* @return string
*/
function bold($bold) {
	return ($bold ? " class='active'" : "");
}

/** Generate class for odd rows
* @param string return this for odd rows, empty to reset counter
* @return string
*/
function odd($return = ' class="odd"') {
	static $i = 0;
	if (!$return) { // reset counter
		$i = -1;
	}
	return ($i++ % 2 ? $return : '');
}

/** Escape string for JavaScript apostrophes
* @param string
* @return string
*/
function js_escape($string) {
	return addcslashes($string, "\r\n'\\/"); // slash for <script>
}

/** Print one row in JSON object
* @param string or "" to close the object
* @param string
* @return null
*/
function json_row($key, $val = null) {
	static $first = true;
	if ($first) {
		echo "{";
	}
	if ($key != "") {
		echo ($first ? "" : ",") . "\n\t\"" . addcslashes($key, "\r\n\"\\") . '": ' . ($val !== null ? '"' . addcslashes($val, "\r\n\"\\") . '"' : 'undefined');
		$first = false;
	} else {
		echo "\n}\n";
		$first = true;
	}
}

/** Get INI boolean value
* @param string
* @return bool
*/
function ini_bool($ini) {
	$val = ini_get($ini);
	return (eregi('^(on|true|yes)$', $val) || (int) $val); // boolean values set by php_value are strings
}

/** Check if SID is neccessary
* @return bool
*/
function sid() {
	static $return;
	if ($return === null) { // restart_session() defines SID
		$return = (SID && !($_COOKIE && ini_bool("session.use_cookies"))); // $_COOKIE - don't pass SID with permanent login
	}
	return $return;
}

/** Shortcut for $connection->quote($string)
* @param string
* @return string
*/
function q($string) {
	global $connection;
	return $connection->quote($string);
}

/** Get list of values from database
* @param string
* @param mixed
* @return array
*/
function get_vals($query, $column = 0) {
	global $connection;
	$return = array();
	$result = $connection->query($query);
	if (is_object($result)) {
		while ($row = $result->fetch_row()) {
			$return[] = $row[$column];
		}
	}
	return $return;
}

/** Get keys from first column and values from second
* @param string
* @param Min_DB
* @return array
*/
function get_key_vals($query, $connection2 = null) {
	global $connection;
	if (!is_object($connection2)) {
		$connection2 = $connection;
	}
	$return = array();
	$result = $connection2->query($query);
	if (is_object($result)) {
		while ($row = $result->fetch_row()) {
			$return[$row[0]] = $row[1];
		}
	}
	return $return;
}

/** Get all rows of result
* @param string
* @param Min_DB
* @param string
* @return array associative
*/
function get_rows($query, $connection2 = null, $error = "<p class='error'>") {
	global $connection;
	$conn = (is_object($connection2) ? $connection2 : $connection);
	$return = array();
	$result = $conn->query($query);
	if (is_object($result)) { // can return true
		while ($row = $result->fetch_assoc()) {
			$return[] = $row;
		}
	} elseif (!$result && !is_object($connection2) && $error && defined("PAGE_HEADER")) {
		echo $error . error() . "\n";
	}
	return $return;
}

/** Find unique identifier of a row
* @param array
* @param array result of indexes()
* @return array or null if there is no unique identifier
*/
function unique_array($row, $indexes) {
	foreach ($indexes as $index) {
		if (ereg("PRIMARY|UNIQUE", $index["type"])) {
			$return = array();
			foreach ($index["columns"] as $key) {
				if (!isset($row[$key])) { // NULL is ambiguous
					continue 2;
				}
				$return[$key] = $row[$key];
			}
			return $return;
		}
	}
}

/** Create SQL condition from parsed query string
* @param array parsed query string
* @param array
* @return string
*/
function where($where, $fields = array()) {
	global $jush;
	$return = array();
	$function_pattern = '(^[\w\(]+' . str_replace("_", ".*", preg_quote(idf_escape("_"))) . '\)+$)'; //! columns looking like functions
	foreach ((array) $where["where"] as $key => $val) {
		$key = bracket_escape($key, 1); // 1 - back
		$column = (preg_match($function_pattern, $key) ? $key : idf_escape($key)); //! SQL injection
		$return[] = $column
			. (($jush == "sql" && ereg('^[0-9]*\\.[0-9]*$', $val)) || $jush == "mssql"
				? " LIKE " . q(addcslashes($val, "%_\\"))
				: " = " . unconvert_field($fields[$key], q($val))
			) // LIKE because of floats but slow with ints, in MS SQL because of text
		; //! enum and set
		if ($jush == "sql" && ereg("[^ -@]", $val)) { // not just [a-z] to catch non-ASCII characters
			$return[] = "$column = " . q($val) . " COLLATE utf8_bin";
		}
	}
	foreach ((array) $where["null"] as $key) {
		$return[] = (preg_match($function_pattern, $key) ? $key : idf_escape($key)) . " IS NULL";
	}
	return implode(" AND ", $return);
}

/** Create SQL condition from query string
* @param string
* @param array
* @return string
*/
function where_check($val, $fields = array()) {
	parse_str($val, $check);
	remove_slashes(array(&$check));
	return where($check, $fields);
}

/** Create query string where condition from value
* @param int condition order
* @param string column identifier
* @param string
* @param string
* @return string
*/
function where_link($i, $column, $value, $operator = "=") {
	return "&where%5B$i%5D%5Bcol%5D=" . urlencode($column) . "&where%5B$i%5D%5Bop%5D=" . urlencode(($value !== null ? $operator : "IS NULL")) . "&where%5B$i%5D%5Bval%5D=" . urlencode($value);
}

/** Get select clause for convertible fields
* @param array
* @param array
* @param array
* @return string
*/
function convert_fields($columns, $fields, $select = array()) {
	$return = "";
	foreach ($columns as $key => $val) {
		if ($select && !in_array(idf_escape($key), $select)) {
			continue;
		}
		$as = convert_field($fields[$key]);
		if ($as) {
			$return .= ", $as AS " . idf_escape($key);
		}
	}
	return $return;
}

/** Set cookie valid for 1 month
* @param string
* @param string
* @return bool
*/
function cookie($name, $value) {
	global $HTTPS;
	$params = array(
		$name,
		(ereg("\n", $value) ? "" : $value), // HTTP Response Splitting protection in PHP < 5.1.2
		time() + 2592000, // 2592000 - 30 days
		preg_replace('~\\?.*~', '', $_SERVER["REQUEST_URI"]),
		"",
		$HTTPS
	);
	if (version_compare(PHP_VERSION, '5.2.0') >= 0) {
		$params[] = true; // HttpOnly
	}
	return call_user_func_array('setcookie', $params);
}

/** Restart stopped session
* @return null
*/
function restart_session() {
	if (!ini_bool("session.use_cookies")) {
		session_start();
	}
}

/** Stop session if it would be possible to restart it later
* @return null
*/
function stop_session() {
	if (!ini_bool("session.use_cookies")) {
		session_write_close();
	}
}

/** Get session variable for current server
* @param string
* @return mixed
*/
function &get_session($key) {
	return $_SESSION[$key][DRIVER][SERVER][$_GET["username"]];
}

/** Set session variable for current server
* @param string
* @param mixed
* @return mixed
*/
function set_session($key, $val) {
	$_SESSION[$key][DRIVER][SERVER][$_GET["username"]] = $val; // used also in auth.inc.php
}

/** Get authenticated URL
* @param string
* @param string
* @param string
* @param string
* @return string
*/
function auth_url($driver, $server, $username, $db = null) {
	global $drivers;
	preg_match('~([^?]*)\\??(.*)~', remove_from_uri(implode("|", array_keys($drivers)) . "|username|" . ($db !== null ? "db|" : "") . session_name()), $match);
	return "$match[1]?"
		. (sid() ? SID . "&" : "")
		. ($driver != "server" || $server != "" ? urlencode($driver) . "=" . urlencode($server) . "&" : "")
		. "username=" . urlencode($username)
		. ($db != "" ? "&db=" . urlencode($db) : "")
		. ($match[2] ? "&$match[2]" : "")
	;
}

/** Find whether it is an AJAX request
* @return bool
*/
function is_ajax() {
	return ($_SERVER["HTTP_X_REQUESTED_WITH"] == "XMLHttpRequest");
}

/** Send Location header and exit
* @param string null to only set a message
* @param string
* @return null
*/
function redirect($location, $message = null) {
	if ($message !== null) {
		restart_session();
		$_SESSION["messages"][preg_replace('~^[^?]*~', '', ($location !== null ? $location : $_SERVER["REQUEST_URI"]))][] = $message;
	}
	if ($location !== null) {
		if ($location == "") {
			$location = ".";
		}
		header("Location: $location");
		exit;
	}
}

/** Execute query and redirect if successful
* @param string
* @param string
* @param string
* @param bool
* @param bool
* @param bool
* @return bool
*/
function query_redirect($query, $location, $message, $redirect = true, $execute = true, $failed = false) {
	global $connection, $error, $adminer;
	$time = "";
	if ($execute) {
		$start = microtime();
		$failed = !$connection->query($query);
		$time = "; -- " . format_time($start, microtime());
	}
	$sql = "";
	if ($query) {
		$sql = $adminer->messageQuery($query . $time);
	}
	if ($failed) {
		$error = error() . $sql;
		return false;
	}
	if ($redirect) {
		redirect($location, $message . $sql);
	}
	return true;
}

/** Execute and remember query
* @param string null to return remembered queries, end with ';' to use DELIMITER
* @return Min_Result
*/
function queries($query = null) {
	global $connection;
	static $queries = array();
	if ($query === null) {
		// return executed queries without parameter
		return implode("\n", $queries);
	}
	$start = microtime();
	$return = $connection->query($query);
	$queries[] = (ereg(';$', $query) ? "DELIMITER ;;\n$query;\nDELIMITER " : $query)
		. "; -- " . format_time($start, microtime());
	return $return;
}

/** Apply command to all array items
* @param string
* @param array
* @param callback
* @return bool
*/
function apply_queries($query, $tables, $escape = 'table') {
	foreach ($tables as $table) {
		if (!queries("$query " . $escape($table))) {
			return false;
		}
	}
	return true;
}

/** Redirect by remembered queries
* @param string
* @param string
* @param bool
* @return bool
*/
function queries_redirect($location, $message, $redirect) {
	return query_redirect(queries(), $location, $message, $redirect, false, !$redirect);
}

/** Format time difference
* @param string output of microtime()
* @param string output of microtime()
* @return string HTML code
*/
function format_time($start, $end) {
	return lang(1, max(0, array_sum(explode(" ", $end)) - array_sum(explode(" ", $start))));
}

/** Remove parameter from query string
* @param string
* @return string
*/
function remove_from_uri($param = "") {
	return substr(preg_replace("~(?<=[?&])($param" . (SID ? "" : "|" . session_name()) . ")=[^&]*&~", '', "$_SERVER[REQUEST_URI]&"), 0, -1);
}

/** Generate page number for pagination
* @param int
* @param int
* @return string
*/
function pagination($page, $current) {
	return " " . ($page == $current ? $page + 1 : '<a href="' . h(remove_from_uri("page") . ($page ? "&page=$page" : "")) . '">' . ($page + 1) . "</a>");
}

/** Get file contents from $_FILES
* @param string
* @param bool
* @return mixed int for error, string otherwise
*/
function get_file($key, $decompress = false) {
	$file = $_FILES[$key];
	if (!$file) {
		return null;
	}
	foreach ($file as $key => $val) {
		$file[$key] = (array) $val;
	}
	$return = '';
	foreach ($file["error"] as $key => $error) {
		if ($error) {
			return $error;
		}
		$name = $file["name"][$key];
		$tmp_name = $file["tmp_name"][$key];
		$content = file_get_contents($decompress && ereg('\\.gz$', $name)
			? "compress.zlib://$tmp_name"
			: $tmp_name
		); //! may not be reachable because of open_basedir
		if ($decompress) {
			$start = substr($content, 0, 3);
			if (function_exists("iconv") && ereg("^\xFE\xFF|^\xFF\xFE", $start, $regs)) { // not ternary operator to save memory
				$content = iconv("utf-16", "utf-8", $content);
			} elseif ($start == "\xEF\xBB\xBF") { // UTF-8 BOM
				$content = substr($content, 3);
			}
		}
		$return .= $content . "\n\n";
	}
	//! support SQL files not ending with semicolon
	return $return;
}

/** Determine upload error
* @param int
* @return string
*/
function upload_error($error) {
	$max_size = ($error == UPLOAD_ERR_INI_SIZE ? ini_get("upload_max_filesize") : 0); // post_max_size is checked in index.php
	return ($error ? lang(2) . ($max_size ? " " . lang(3, $max_size) : "") : lang(4));
}

/** Create repeat pattern for preg
* @param string
* @param int
* @return string
*/
function repeat_pattern($pattern, $length) {
	// fix for Compilation failed: number too big in {} quantifier
	return str_repeat("$pattern{0,65535}", $length / 65535) . "$pattern{0," . ($length % 65535) . "}"; // can create {0,0} which is OK
}

/** Check whether the string is in UTF-8
* @param string
* @return bool
*/
function is_utf8($val) {
	// don't print control chars except \t\r\n
	return (preg_match('~~u', $val) && !preg_match('~[\\0-\\x8\\xB\\xC\\xE-\\x1F]~', $val));
}

/** Shorten UTF-8 string
* @param string
* @param int
* @param string
* @return string escaped string with appended ...
*/
function shorten_utf8($string, $length = 80, $suffix = "") {
	if (!preg_match("(^(" . repeat_pattern("[\t\r\n -\x{FFFF}]", $length) . ")($)?)u", $string, $match)) { // ~s causes trash in $match[2] under some PHP versions, (.|\n) is slow
		preg_match("(^(" . repeat_pattern("[\t\r\n -~]", $length) . ")($)?)", $string, $match);
	}
	return h($match[1]) . $suffix . (isset($match[2]) ? "" : "<i>...</i>");
}

/** Generate friendly URL
* @param string
* @return string
*/
function friendly_url($val) {
	// used for blobs and export
	return preg_replace('~[^a-z0-9_]~i', '-', $val);
}

/** Print hidden fields
* @param array
* @param array
* @return null
*/
function hidden_fields($process, $ignore = array()) {
	while (list($key, $val) = each($process)) {
		if (is_array($val)) {
			foreach ($val as $k => $v) {
				$process[$key . "[$k]"] = $v;
			}
		} elseif (!in_array($key, $ignore)) {
			echo '<input type="hidden" name="' . h($key) . '" value="' . h($val) . '">';
		}
	}
}

/** Print hidden fields for GET forms
* @return null
*/
function hidden_fields_get() {
	echo (sid() ? '<input type="hidden" name="' . session_name() . '" value="' . h(session_id()) . '">' : '');
	echo (SERVER !== null ? '<input type="hidden" name="' . DRIVER . '" value="' . h(SERVER) . '">' : "");
	echo '<input type="hidden" name="username" value="' . h($_GET["username"]) . '">';
}

/** Get status of a single table and fall back to name on error
* @param string
* @param bool
* @return array
*/
function table_status1($table, $fast = false) {
	$return = table_status($table, $fast);
	return ($return ? $return : array("Name" => $table));
}

/** Find out foreign keys for each column
* @param string
* @return array array($col => array())
*/
function column_foreign_keys($table) {
	global $adminer;
	$return = array();
	foreach ($adminer->foreignKeys($table) as $foreign_key) {
		foreach ($foreign_key["source"] as $val) {
			$return[$val][] = $foreign_key;
		}
	}
	return $return;
}

/** Print enum input field
* @param string "radio"|"checkbox"
* @param string
* @param array
* @param mixed int|string|array
* @param string
* @return null
*/
function enum_input($type, $attrs, $field, $value, $empty = null) {
	global $adminer;
	preg_match_all("~'((?:[^']|'')*)'~", $field["length"], $matches);
	$return = ($empty !== null ? "<label><input type='$type'$attrs value='$empty'" . ((is_array($value) ? in_array($empty, $value) : $value === 0) ? " checked" : "") . "><i>" . lang(5) . "</i></label>" : "");
	foreach ($matches[1] as $i => $val) {
		$val = stripcslashes(str_replace("''", "'", $val));
		$checked = (is_int($value) ? $value == $i+1 : (is_array($value) ? in_array($i+1, $value) : $value === $val));
		$return .= " <label><input type='$type'$attrs value='" . ($i+1) . "'" . ($checked ? ' checked' : '') . '>' . h($adminer->editVal($val, $field)) . '</label>';
	}
	return $return;
}

/** Print edit input field
* @param array one field from fields()
* @param mixed
* @param string
* @return null
*/
function input($field, $value, $function) {
	global $connection, $types, $adminer, $jush;
	$name = h(bracket_escape($field["field"]));
	echo "<td class='function'>";
	$reset = ($jush == "mssql" && $field["auto_increment"]);
	if ($reset && !$_POST["save"]) {
		$function = null;
	}
	$functions = (isset($_GET["select"]) || $reset ? array("orig" => lang(6)) : array()) + $adminer->editFunctions($field);
	$attrs = " name='fields[$name]'";
	if ($field["type"] == "enum") {
		echo nbsp($functions[""]) . "<td>" . $adminer->editInput($_GET["edit"], $field, $attrs, $value);
	} else {
		$first = 0;
		foreach ($functions as $key => $val) {
			if ($key === "" || !$val) {
				break;
			}
			$first++;
		}
		$onchange = ($first ? " onchange=\"var f = this.form['function[" . h(js_escape(bracket_escape($field["field"]))) . "]']; if ($first > f.selectedIndex) f.selectedIndex = $first;\"" : "");
		$attrs .= $onchange;
		echo (count($functions) > 1 ? html_select("function[$name]", $functions, $function === null || in_array($function, $functions) || isset($functions[$function]) ? $function : "", "functionChange(this);") : nbsp(reset($functions))) . '<td>';
		$input = $adminer->editInput($_GET["edit"], $field, $attrs, $value); // usage in call is without a table
		if ($input != "") {
			echo $input;
		} elseif ($field["type"] == "set") { //! 64 bits
			preg_match_all("~'((?:[^']|'')*)'~", $field["length"], $matches);
			foreach ($matches[1] as $i => $val) {
				$val = stripcslashes(str_replace("''", "'", $val));
				$checked = (is_int($value) ? ($value >> $i) & 1 : in_array($val, explode(",", $value), true));
				echo " <label><input type='checkbox' name='fields[$name][$i]' value='" . (1 << $i) . "'" . ($checked ? ' checked' : '') . "$onchange>" . h($adminer->editVal($val, $field)) . '</label>';
			}
		} elseif (ereg('blob|bytea|raw|file', $field["type"]) && ini_bool("file_uploads")) {
			echo "<input type='file' name='fields-$name'$onchange>";
		} elseif (($text = ereg('text|lob', $field["type"])) || ereg("\n", $value)) {
			if ($text && $jush != "sqlite") {
				$attrs .= " cols='50' rows='12'";
			} else {
				$rows = min(12, substr_count($value, "\n") + 1);
				$attrs .= " cols='30' rows='$rows'" . ($rows == 1 ? " style='height: 1.2em;'" : ""); // 1.2em - line-height
			}
			echo "<textarea$attrs>" . h($value) . '</textarea>';
		} else {
			// int(3) is only a display hint
			$maxlength = (!ereg('int', $field["type"]) && preg_match('~^(\\d+)(,(\\d+))?$~', $field["length"], $match) ? ((ereg("binary", $field["type"]) ? 2 : 1) * $match[1] + ($match[3] ? 1 : 0) + ($match[2] && !$field["unsigned"] ? 1 : 0)) : ($types[$field["type"]] ? $types[$field["type"]] + ($field["unsigned"] ? 0 : 1) : 0));
			if ($jush == 'sql' && $connection->server_info >= 5.6 && ereg('time', $field["type"])) {
				$maxlength += 7; // microtime
			}
			// type='date' and type='time' display localized value which may be confusing, type='datetime' uses 'T' as date and time separator
			echo "<input" . (ereg('int', $field["type"]) ? " type='number'" : "") . " value='" . h($value) . "'" . ($maxlength ? " maxlength='$maxlength'" : "") . (ereg('char|binary', $field["type"]) && $maxlength > 20 ? " size='40'" : "") . "$attrs>";
		}
	}
}

/** Process edit input field
* @param one field from fields()
* @return string
*/
function process_input($field) {
	global $adminer;
	$idf = bracket_escape($field["field"]);
	$function = $_POST["function"][$idf];
	$value = $_POST["fields"][$idf];
	if ($field["type"] == "enum") {
		if ($value == -1) {
			return false;
		}
		if ($value == "") {
			return "NULL";
		}
		return +$value;
	}
	if ($field["auto_increment"] && $value == "") {
		return null;
	}
	if ($function == "orig") {
		return ($field["on_update"] == "CURRENT_TIMESTAMP" ? idf_escape($field["field"]) : false);
	}
	if ($function == "NULL") {
		return "NULL";
	}
	if ($field["type"] == "set") {
		return array_sum((array) $value);
	}
	if (ereg('blob|bytea|raw|file', $field["type"]) && ini_bool("file_uploads")) {
		$file = get_file("fields-$idf");
		if (!is_string($file)) {
			return false; //! report errors
		}
		return q($file);
	}
	return $adminer->processInput($field, $value, $function);
}

/** Print results of search in all tables
* @uses $_GET["where"][0]
* @uses $_POST["tables"]
* @return null
*/
function search_tables() {
	global $adminer, $connection;
	$_GET["where"][0]["op"] = "LIKE %%";
	$_GET["where"][0]["val"] = $_POST["query"];
	$found = false;
	foreach (table_status('', true) as $table => $table_status) {
		$name = $adminer->tableName($table_status);
		if (isset($table_status["Engine"]) && $name != "" && (!$_POST["tables"] || in_array($table, $_POST["tables"]))) {
			$result = $connection->query("SELECT" . limit("1 FROM " . table($table), " WHERE " . implode(" AND ", $adminer->selectSearchProcess(fields($table), array())), 1));
			if (!$result || $result->fetch_row()) {
				if (!$found) {
					echo "<ul>\n";
					$found = true;
				}
				echo "<li>" . ($result
					? "<a href='" . h(ME . "select=" . urlencode($table) . "&where[0][op]=" . urlencode($_GET["where"][0]["op"]) . "&where[0][val]=" . urlencode($_GET["where"][0]["val"])) . "'>$name</a>\n"
					: "$name: <span class='error'>" . error() . "</span>\n");
			}
		}
	}
	echo ($found ? "</ul>" : "<p class='message'>" . lang(7)) . "\n";
}

/** Send headers for export
* @param string
* @param bool
* @return string extension
*/
function dump_headers($identifier, $multi_table = false) {
	global $adminer;
	$return = $adminer->dumpHeaders($identifier, $multi_table);
	$output = $_POST["output"];
	if ($output != "text") {
		header("Content-Disposition: attachment; filename=" . $adminer->dumpFilename($identifier) . ".$return" . ($output != "file" && !ereg('[^0-9a-z]', $output) ? ".$output" : ""));
	}
	session_write_close();
	ob_flush();
	flush();
	return $return;
}

/** Print CSV row
* @param array
* @return null
*/
function dump_csv($row) {
	foreach ($row as $key => $val) {
		if (preg_match("~[\"\n,;\t]~", $val) || $val === "") {
			$row[$key] = '"' . str_replace('"', '""', $val) . '"';
		}
	}
	echo implode(($_POST["format"] == "csv" ? "," : ($_POST["format"] == "tsv" ? "\t" : ";")), $row) . "\r\n";
}

/** Apply SQL function
* @param string
* @param string escaped column identifier
* @return string
*/
function apply_sql_function($function, $column) {
	return ($function ? ($function == "unixepoch" ? "DATETIME($column, '$function')" : ($function == "count distinct" ? "COUNT(DISTINCT " : strtoupper("$function(")) . "$column)") : $column);
}

/** Read password from file adminer.key in temporary directory or create one
* @param bool
* @return string or false if the file can not be created
*/
function password_file($create) {
	$dir = ini_get("upload_tmp_dir"); // session_save_path() may contain other storage path
	if (!$dir) {
		if (function_exists('sys_get_temp_dir')) {
			$dir = sys_get_temp_dir();
		} else {
			$filename = @tempnam("", ""); // @ - temp directory can be disabled by open_basedir
			if (!$filename) {
				return false;
			}
			$dir = dirname($filename);
			unlink($filename);
		}
	}
	$filename = "$dir/adminer.key";
	$return = @file_get_contents($filename); // @ - can not exist
	if ($return || !$create) {
		return $return;
	}
	$fp = @fopen($filename, "w"); // @ - can have insufficient rights //! is not atomic
	if ($fp) {
		$return = md5(uniqid(mt_rand(), true));
		fwrite($fp, $return);
		fclose($fp);
	}
	return $return;
}

/** Check whether the string is e-mail address
* @param string
* @return bool
*/
function is_mail($email) {
	$atom = '[-a-z0-9!#$%&\'*+/=?^_`{|}~]'; // characters of local-name
	$domain = '[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])'; // one domain component
	$pattern = "$atom+(\\.$atom+)*@($domain?\\.)+$domain";
	return preg_match("(^$pattern(,\\s*$pattern)*\$)i", $email);
}

/** Check whether the string is URL address
* @param string
* @return string "http", "https" or ""
*/
function is_url($string) {
	$domain = '[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])'; // one domain component //! IDN
	return (preg_match("~^(https?)://($domain?\\.)+$domain(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i", $string, $match) ? strtolower($match[1]) : ""); //! restrict path, query and fragment characters
}

/** Check if field should be shortened
* @param array
* @return bool
*/
function is_shortable($field) {
	return ereg('char|text|lob|geometry|point|linestring|polygon', $field["type"]);
}

/** Run query which can be killed by AJAX call after timing out
* @param string
* @return Min_Result
*/
function slow_query($query) {
	global $adminer, $token;
	$db = $adminer->database();
	if (support("kill") && is_object($connection2 = connect()) && ($db == "" || $connection2->select_db($db))) {
		$kill = $connection2->result("SELECT CONNECTION_ID()"); // MySQL and MySQLi can use thread_id but it's not in PDO_MySQL
		?>
<script type="text/javascript">
var timeout = setTimeout(function () {
	ajax('<?php echo js_escape(ME); ?>script=kill', function () {
	}, 'token=<?php echo $token; ?>&kill=<?php echo $kill; ?>');
}, <?php echo 1000 * $adminer->queryTimeout(); ?>);
</script>
<?php
	} else {
		$connection2 = null;
	}
	ob_flush();
	flush();
	$return = @get_key_vals($query, $connection2); // @ - may be killed
	if ($connection2) {
		echo "<script type='text/javascript'>clearTimeout(timeout);</script>\n";
		ob_flush();
		flush();
	}
	return array_keys($return);
}

// used in compiled version
function lzw_decompress($binary) {
	// convert binary string to codes
	$dictionary_count = 256;
	$bits = 8; // ceil(log($dictionary_count, 2))
	$codes = array();
	$rest = 0;
	$rest_length = 0;
	for ($i=0; $i < strlen($binary); $i++) {
		$rest = ($rest << 8) + ord($binary[$i]);
		$rest_length += 8;
		if ($rest_length >= $bits) {
			$rest_length -= $bits;
			$codes[] = $rest >> $rest_length;
			$rest &= (1 << $rest_length) - 1;
			$dictionary_count++;
			if ($dictionary_count >> $bits) {
				$bits++;
			}
		}
	}
	// decompression
	$dictionary = range("\0", "\xFF");
	$return = "";
	foreach ($codes as $i => $code) {
		$element = $dictionary[$code];
		if (!isset($element)) {
			$element = $word . $word[0];
		}
		$return .= $element;
		if ($i) {
			$dictionary[] = $word . $element[0];
		}
		$word = $element;
	}
	return $return;
}


global $adminer, $connection, $drivers, $edit_functions, $enum_length, $error, $functions, $grouping, $HTTPS, $inout, $jush, $LANG, $langs, $on_actions, $permanent, $structured_types, $token, $translations, $types, $unsigned, $VERSION; // allows including Adminer inside a function

if (!$_SERVER["REQUEST_URI"]) { // IIS 5 compatibility
	$_SERVER["REQUEST_URI"] = $_SERVER["ORIG_PATH_INFO"];
}
if (!strpos($_SERVER["REQUEST_URI"], '?') && $_SERVER["QUERY_STRING"] != "") { // IIS 7 compatibility
	$_SERVER["REQUEST_URI"] .= "?$_SERVER[QUERY_STRING]";
}
$HTTPS = $_SERVER["HTTPS"] && strcasecmp($_SERVER["HTTPS"], "off");

@ini_set("session.use_trans_sid", false); // protect links in export, @ - may be disabled
if (!defined("SID")) {
	session_name("adminer_sid"); // use specific session name to get own namespace
	$params = array(0, preg_replace('~\\?.*~', '', $_SERVER["REQUEST_URI"]), "", $HTTPS);
	if (version_compare(PHP_VERSION, '5.2.0') >= 0) {
		$params[] = true; // HttpOnly
	}
	call_user_func_array('session_set_cookie_params', $params); // ini_set() may be disabled
	session_start();
}

// disable magic quotes to be able to use database escaping function
remove_slashes(array(&$_GET, &$_POST, &$_COOKIE), $filter);
if (function_exists("set_magic_quotes_runtime")) { // removed in PHP 6
	set_magic_quotes_runtime(false);
}
@set_time_limit(0); // @ - can be disabled
@ini_set("zend.ze1_compatibility_mode", false); // @ - deprecated
@ini_set("precision", 20); // @ - can be disabled


// not used in a single language version

$langs = array(
	'en' => 'English', // Jakub Vrána - http://www.vrana.cz
	'ar' => 'العربية', // Y.M Amine - Algeria - nbr7@live.fr
	'bn' => 'বাংলা', // Dipak Kumar - dipak.ndc@gmail.com
	'ca' => 'Català', // Joan Llosas
	'cs' => 'Čeština', // Jakub Vrána - http://www.vrana.cz
	'de' => 'Deutsch', // Klemens Häckel - http://clickdimension.wordpress.com
	'es' => 'Español', // Klemens Häckel - http://clickdimension.wordpress.com
	'et' => 'Eesti', // Priit Kallas
	'fa' => 'فارسی', // mojtaba barghbani - Iran - mbarghbani@gmail.com
	'fr' => 'Français', // Francis Gagné, Aurélien Royer
	'hu' => 'Magyar', // Borsos Szilárd (Borsosfi) - http://www.borsosfi.hu, info@borsosfi.hu
	'id' => 'Bahasa Indonesia', // Ivan Lanin - http://ivan.lanin.org
	'it' => 'Italiano', // Alessandro Fiorotto, Paolo Asperti
	'ja' => '日本語', // Hitoshi Ozawa - http://sourceforge.jp/projects/oss-ja-jpn/releases/
	'ko' => '한국어', // dalli - skcha67@gmail.com
	'lt' => 'Lietuvių', // Paulius Leščinskas - http://www.lescinskas.lt
	'nl' => 'Nederlands', // Maarten Balliauw - http://blog.maartenballiauw.be
	'pl' => 'Polski', // Radosław Kowalewski - http://srsbiz.pl/
	'pt' => 'Português', // Gian Live - gian@live.com, Davi Alexandre davi@davialexandre.com.br
	'ro' => 'Limba Română', // .nick .messing - dot.nick.dot.messing@gmail.com
	'ru' => 'Русский язык', // Maksim Izmaylov
	'sk' => 'Slovenčina', // Ivan Suchy - http://www.ivansuchy.com, Juraj Krivda - http://www.jstudio.cz
	'sl' => 'Slovenski', // Matej Ferlan - www.itdinamik.com, matej.ferlan@itdinamik.com
	'sr' => 'Српски', // Nikola Radovanović - cobisimo@gmail.com
	'ta' => 'த‌மிழ்', // G. Sampath Kumar, Chennai, India, sampathkumar11@gmail.com
	'tr' => 'Türkçe', // Bilgehan Korkmaz - turktron.com
	'uk' => 'Українська', // Valerii Kryzhov
	'zh' => '简体中文', // Mr. Lodar
	'zh-tw' => '繁體中文', // http://tzangms.com
);

/** Get current language
* @return string
*/
function get_lang() {
	global $LANG;
	return $LANG;
}

/** Translate string
* @param string
* @param int
* @return string
*/
function lang($idf, $number = null) {
	if (is_string($idf)) { // compiled version uses numbers, string comes from a plugin
		// English translation is closest to the original identifiers //! pluralized translations are not found
		$pos = array_search($idf, get_translations("en")); //! this should be cached
		if ($pos !== false) {
			$idf = $pos;
		}
	}
	global $LANG, $translations;
	$translation = ($translations[$idf] ? $translations[$idf] : $idf);
	if (is_array($translation)) {
		$pos = ($number == 1 ? 0
			: ($LANG == 'cs' || $LANG == 'sk' ? ($number && $number < 5 ? 1 : 2) // different forms for 1, 2-4, other
			: ($LANG == 'fr' ? (!$number ? 0 : 1) // different forms for 0-1, other
			: ($LANG == 'pl' ? ($number % 10 > 1 && $number % 10 < 5 && $number / 10 % 10 != 1 ? 1 : 2) // different forms for 1, 2-4, other
			: ($LANG == 'sl' ? ($number % 100 == 1 ? 0 : ($number % 100 == 2 ? 1 : ($number % 100 == 3 || $number % 100 == 4 ? 2 : 3))) // different forms for 1, 2, 3-4, other
			: ($LANG == 'lt' ? ($number % 10 == 1 && $number % 100 != 11 ? 0 : ($number % 10 > 1 && $number / 10 % 10 != 1 ? 1 : 2)) // different forms for 1, 12-19, other
			: ($LANG == 'ru' || $LANG == 'sr' || $LANG == 'uk' ? ($number % 10 == 1 && $number % 100 != 11 ? 0 : ($number % 10 > 1 && $number % 10 < 5 && $number / 10 % 10 != 1 ? 1 : 2)) // different forms for 1, 2-4, other
			: 1
		))))))); // http://www.gnu.org/software/gettext/manual/html_node/Plural-forms.html
		$translation = $translation[$pos];
	}
	$args = func_get_args();
	array_shift($args);
	$format = str_replace("%d", "%s", $translation);
	if ($format != $translation) {
		$args[0] = number_format($number, 0, ".", lang(8));
	}
	return vsprintf($format, $args);
}

function switch_lang() {
	global $LANG, $langs;
	echo "<form action='' method='post'>\n<div id='lang'>";
	echo lang(9) . ": " . html_select("lang", $langs, $LANG, "this.form.submit();");
	echo " <input type='submit' value='" . lang(10) . "' class='hidden'>\n";
	echo "<input type='hidden' name='token' value='$_SESSION[token]'>\n"; // $token may be empty in auth.inc.php
	echo "</div>\n</form>\n";
}

if (isset($_POST["lang"]) && $_SESSION["token"] == $_POST["token"]) { // $token and $error not yet available
	cookie("adminer_lang", $_POST["lang"]);
	$_SESSION["lang"] = $_POST["lang"]; // cookies may be disabled
	$_SESSION["translations"] = array(); // used in compiled version
	redirect(remove_from_uri());
}

$LANG = "en";
if (isset($langs[$_COOKIE["adminer_lang"]])) {
	cookie("adminer_lang", $_COOKIE["adminer_lang"]);
	$LANG = $_COOKIE["adminer_lang"];
} elseif (isset($langs[$_SESSION["lang"]])) {
	$LANG = $_SESSION["lang"];
} else {
	$accept_language = array();
	preg_match_all('~([-a-z]+)(;q=([0-9.]+))?~', str_replace("_", "-", strtolower($_SERVER["HTTP_ACCEPT_LANGUAGE"])), $matches, PREG_SET_ORDER);
	foreach ($matches as $match) {
		$accept_language[$match[1]] = (isset($match[3]) ? $match[3] : 1);
	}
	arsort($accept_language);
	foreach ($accept_language as $key => $q) {
		if (isset($langs[$key])) {
			$LANG = $key;
			break;
		}
		$key = preg_replace('~-.*~', '', $key);
		if (!isset($accept_language[$key]) && isset($langs[$key])) {
			$LANG = $key;
			break;
		}
	}
}

$translations = &$_SESSION["translations"];
if ($_SESSION["translations_version"] != 2121441971) {
	$translations = array();
	$_SESSION["translations_version"] = 2121441971;
}

function get_translations($lang) {
	switch ($lang) {
		case "en": $compressed = "A9D�y�@s:�G�(�ff�����	��:�S���a2\"1�..L'�I��m�#�s,�K��OP#I�@%9��i4�o2ύ���,9�%Si��y�F�9�(l�GH�\\�(��q��a3�bG;�B.a�F�&�t�: T��s4�'�\n�P:Y�fS���p��e�,��D0�dF�	�[r)�+v��\n�a9V	�S�޴k̦�n�cj��AE3�F�����3�Sz\n(^{c��?���.D�}t���m�jl{�ȋ��N��o;��G_T&�A6ar�cI��?�,��M��4��h\"�(�:��X�!��<��HKCȦ2�#�#�s�İ�\0�3�#;C9\r��4K`�;�H��DC\"�1�К��\r��������:����� C�ƶ8b��m���+,þ9�.T\0���زN��J��hC*�j���͎�<�b���\"�<\$���>��S���S��;���6\"�T�쮀T�=S�?#�\$�ð�6\r)�)�B3,7�l0\\C�#,�\$��`�*�P���H��3J)D?eE8�8G�\\��✊J�%����8\r(��&����EXU=SUղ���\r5[\$�8̨��:�\n�r\\ոx����C@�:�^���\\�H���+C8^�c��\n��xE�K����5�A�u7�p��|����7����Z�E��y�P�1���K�@��r�9jL*B(	���i��P�)�UI4�%Ib\\�\r��ӪUi�j�?�`ȟ)�j���֞DӲ��B�ލJ�@(	☩5;������yM�l��1����K��J�Q}�	�1;��(,��#h�>��|h�\\K[�p�\$b0��-�\n[�)�0�97�;��%EUV\$4�ں%\r��'�Dʁ3�4��Z|�Q���IR���N.�e��U��+6̨�5-�g�!�M<3�v��g\r=���H���Emܼ@X\"��YIF�7�'Tw¢3��5\0�ޒ�\$*|�4�4����h2�����Ivd��p \n�@\"�@T@\"���Ӥ%���S`Y�i��\$<���a�:L	�Y���ҨtP����\nQ)�L:��8Y�\"!����DJCy�v�Ap�wܸm�%�+��R�Q\r�My#��C�4�=P�I�eI��ǲm\r!�8�`*�'\0�|2Ҹ��`���6I%x� ǑP�pB�_��^3!�3hF{_a��,\"�'�&�\0q���\r�`��03�Fm�����w	�-tM�`H�0fTn\0�C)9��k@�u���|	�a�3�o4�c��'�fsϠ�J&�ڞ�6t���ٛg�� �E�Y�'p�Fc�#��-�	�E����pjp��Ms�|)�l�X����	�tPp��wΌ�\$KR�PH8%h�2*)��S��@����������W�����&��PK��5���s)Y��BDNă=�R�J�(�Y�Zܮ��S\$�\r����]+6+�ԧU�@��^�JT�F��\\��8�u���C1Am	�o�U���jj�x�O�5�z4H��)QJł�&Q�6�Ct/p����\"�-��\$��UX��]-i���l<\0�_\\R\r��\$��Ia����[�io|��^�W\r�U��a�ګe]-�x����[8ovX*tNƉ�&�	�-t���`���/���8W_rck��\\�Bea4�I�����O#�=1�jXy+�,RO��1���C2*a�&|XN�Zr�*<7�8{>l}\rrL�����Y<�\r��F���;��_�M�Έ����e��07ikf�h묖�mU�2���\n�aWi7w8��iO89�s(YN\\S����,�䔑��!`y2���������3�W��������nb�9\nPY�y5M�ڧPa�\n�SHe�8+Q=v�Z�L�߄�oBUŰ%%��y���]�ȯ��\\���.����e]o&I\"%I�\\/���֤Y�����(78d>���ne�@e�Y�Pǐr7�Xʚ��������r����t��|�o�ZJ8��چ�p���8��&Z&�7��!\\���lq�Jex��T�r���9��q&�TFЫP��Ӡ���m?v�@�5�\$�u��ro@�������\0�I��ޣ=m��\\����6��x��Z��!`	}�� ���h/�Sw�׺���-���!���\n��a�9�8�F@\r!�s �D@�o]�T*`Z�]HA��c�@�������>����\"hDC�4X\n&�Qˆ�>g�%�hʰ7x�\"�����ǒ��\\@W�~�p��Σ�ֆ��#�:@�	?6�z�6|�72�=���	r�D\"����������ֿ�vz�CLH�v��ʲ\rL�\$b��s���c<�ڸ+�\0����b��,F�&�����\"�\"v�(�\0MA�pr��\\�H�D jl�2�S���h�����ϧ�O-�S �)����,牺�Z<BL��iJ3	��\r�����\n\"�"; break;
		case "ar": $compressed = "�C�P���l*�\r�,&\n�A���(J.��0T2]6QM��O�!b�#e�\\ɥ�\$�\\\nl+[\n�d�k4�O��&�ղ���Q)̅7lI���E\$�ʑ��m_7�Td������Q�%F����PEdJ�]�MŖiE�t�T�'템9sBGeHh\\�m(A��L6#%9�Q�JXd:&��hC�aΡR�Pcչ�z����n�<*���̡g\n9��%��h5ut.���QS��\n��Ķp{���l-\n��;�D��\n��n�����g�h��wk0�GPs<�:�e�:�4��T���F��\rp�0���(H�\\�:0��	�k�.DB��Ҝ@ŉ�[(PR��1\"�6hs���eC��30�	��{z��Q��������� 7�J�*�}H,2A+�F��p�Ai#�\"6q�x�\$e�q'EZ:@�I����d}L��4�Ԝ'Ezp[���@%��#�`���6���0���&���jNB���&M�q[@,%ħ*�*?��U,R�m*\$QP����[�N���*�o_��U�_�m_�*�iF,�<ϵ�4�O13�I2d�B5�:�%�cwa2��ȷ|�AU�-���S�Z�W�E�SG-��:\r�P�)�B0@*\r�X�7 ���Sӣ���\"�J��LªLݸθL���K;��d�\"Ԉ-�:�m>�'�n@�����Np�<f��Y��a�.w\$7]9д0�%�[8Nzt%�-�������:��@8lC��7�R��<H�2���x0�F�3��:��t��# �4��(]��~� �9�#x��T��9�(龋��05�A�6��ۇ���^0��(A׎�@�,�n0��\0�:l�(�Lv�:�3�jB���Z��X6�}�C��8?�j&��l�*������j��z䓫e���lb�(�2���/.�Bށ\\)���bG�aMd����j�O\naP��T��C*,U�*���15\$bԂ���`ax!���b�R�~L\$M?�&���Pk(]0����B�H\n�,������7��@�i�Q�\0�T� ���`�\"xnK��6ǈ��r\rᴍ�P��φ�%|�����̵'A�t,\rQ�+k��uf��S=X���D~�d4u[D<���Xd\"����8��:��9�.��P���� \n�'E���aM�)���K3�cA�Bb�Jw�!P�A�5=��4��;Q6���{1LM��'#Rq��V3\0@�U��R�W�D�G��[�q�.gP��v����'0���U+Nt��B���P�*Y�?� E	������9�|�	.�Bz�s�LG�؜�I�<,P�[\r��I��.��#�y���9�p�ϣ@c��V�A-�l]�|��' ���BBɩm7�t���aQ��9��ğbr��0����mQ\"�E���d��En�&I��gj�M�]��h'�n���tL�?\$�:SR�+g�<�Թ��X�)�@V6�/B�Q�k�y���e��Vٸ�°�bF_��m@VDx�Kn3�2-F}Y\"�>�����\0�\\�f58�U�rW��_.2�1�y/0���)Ü��aLK>`T�)qaB��3�S����s,z5%'�6�P����%�eT�Ϻgp�S@+Ap	���^��N�+h@���K�NJ�&	К�[֗Nq�\$�=Ҩ�J�.�VBTb��	qs�_\n5���g7��إ�� ABbV��Hrb�!��Mk���TG��,�\n���?���x�P_��I\"��Qz�]�G��Rb�r'f��R\$�*J�!B�,G\r�7�\0�r\r1mJ:��K���)\0�s��Ra��\n�R��1/�+ P����Fa˄�<�O�[\$`��UR\\�Vc#���R!y˺Z�\r��������y!���rC��`�#<jQ(|t�w]�\\si����B|�ur{�E0>��\$��Z�N60�lW�W�� Ə� Rp&q��ע@�*d[d����ɠc�P��+:L�-�\$�����b�Y����j���8F��:�V�^�����srN!o�-z�֔c�p�#���%��xެMV��f��e�Ѧtn�B�R�왛#t�93,3�y�y��Y��ӄ��:�}��GA]%�+�9�&�C��F�t���K��p��:0�J�]?���2�*!i,.�K��XE��67D�����Пt#���;�m�Y�}�w�3�<��Q�\"b����};d�\\w2���9�}8ק�Sy�PQ��Kƌ_]]w7h�(n���;\\7�g�i̲�����qNE��F]����\n�M��Am���/��u?��ٛ9�dѱ��[�r�VttH��rݦ���uv������\r������O�����c��b�O��C>9�u\0�Ң�F�϶�p�0�iD���I�e-���*����Th���*(FVeaR�\n��D�o�H0O&��cM��j90H���P^U�a0f!p�&�ℱ��L����+��������\$;	D��'\n�%@9C��Po	Z!�h!����¶cso��m�\nʭ��\"q\0AƩ�ł/��+}����bL��	v���\n�2�\\�L:�Σ�^�\\E�&���4�����n)l&����\r�V`�\r �\r`@sH��@�\r��R�zv�v\r �'��nȰR����\0�R��\0��Z\0@a�� ��~�����\ri�,h�1�)Q.�%C����C�g\rE䌹�K�`�bh���FŚN�:�p�)-����G�*�%�t�\"ФH0@����q��!���R1O\"ꆢ\"S�d�e\\W�4-���2@��u\$���I^6��\0�Wn8��%`�RE(���ͱ�a�^\0茀�F�餗&�Z�/��j�����2_)��-z\"���@�L)*�X���ːʾ��3�Ѱ����I�6�t�T�t���\n��2D�J��jn.��2��V%�/D�:�`8V4�E^*��k�U�3�PP@�	\0t	��@�\n`"; break;
		case "bn": $compressed = "�S)\nt]\0_� 	XD)L��@�4l5���BQp�� 9��\n��\0��,��h�SE�0�b�a%�. �H�\0��.b��2n��D�e*�D��M���,OJÐ��v����х\$:IK��g5U4�L�	Nd!u>�&������a\\�@'Jx��S���4�zZز�S��H�MS���]�O��E2��\\�J1��|�Ц[�i�L��_?�P��\n~b¨�#�m\r/����t7�B�'��C��]��sl����2G��Զ�抍��^TȘs����<\neU>���c��U�>ݣ�����S �L^>�#�²�4\nپjR������h���\r�*������O�~�1��d�#\n��t��t.���b��������jبå;���\n�P��[q ��{ S�J��*�% d+�/QQ���!�N�\n�/�>�&\n|�P0� ��y&֣L���s^�����)�pҼ*�����C,���p\$\$��\$eM ��'#P��.�α��R�Ӛ���#����Mk[���]B?1sL�\n�k8(r۾��.{�_�v\r�����>�PЊvהlk=NJ��;��G4���n�=�z�E��#-�M�,��m��U�7�=�cjL(�}�{#�d#�`���6�\0�0��P�(��k���4B@[�,�~���3+bS[����6�r�hP�e/�1���Yb��u5N����hV.�� E>cLT^�SJ\r|��J�^�	h���5Г!*4W̵�k��)�\0ª;�\r��ʖ=w���Ӗ{� ��V����޳U��޻kg\rà���ɠ)Sj��NS8�:Jz��j�8@!�b���3��܈)�6��%t|/�5���4Ȁp���R�Ck�^����x,�gP}��s9��/���Q�L�=>�%t�u�a�:�-ź�qAo2�w0'v����T٨=\$��<'x�Ik��(��C�t�� øoJ�2���C�e����D!�����:�;�P\\C m\r!�	��4�xe\r�<A ��Ho�`����(t��}������I\r���؄�/ ���0A��h\r��:��C[\r!�\n�0��\"�udj��3\\��Q�/vo�\0P	A�c\n��)e ���E L\0(.@�����q����=L��,*!�e���)3�fU�5�)���+*�`�����3�EOe���v�C~~ǢILQ2�b�H���/U��VF�\\���^)S�G��y\"BxS\n�9ɯ��Y�^��b0d�,̀���t�6J,�I2�Ă�k�6���͓4X�\$ݘ��,����n�.�p!8b\r!�1�0ic\0�;�N���c��4Ÿ5#�(A�6�&�ꀀ��x�C^�Olᨳ���fx��T(���V��Q�H/>�5�oS[\r	z����5s\\\"���ʰ3�՘3��mn|4w�TY�J�H����ɪ�Z&�.#6W�G\n�� u_�ёR2Y�x�%�:�H'��t֬��%�n3u�TK�9Ls)���)�#����;D��i�q/��MKW���v�YV�����\\�uY�9��;�	�UV�����j�g�\n��2������)��:w�2PH\"~�8f�ڈ�����2ٙ2LH�� �I}�d�%�=�=f~�R��\rA7�D@�c��BH~�M�7Ry,���/¸S�I]�)L�#u�m�*��0i�q���}���ǔ��1/w4�Id��&5�*��3QL�H\0��. �+h��AX8�[դ�2�a�����Su�a��8�7�-=�C�U\nYY�l]w\n��{Vf��Gs�h�C���)�F����Å;��l���Y��L�s�B����&�4���R�׶卦�J����@Gf�����3�䥤|�_ن�\rc;Hy?a�:���NTM(@*�Wyꫥm�0�]�����������3[շ�\\v;-@��Mt��i״[\0���3�\n��wif�:�fX��;f�l����;��/�q�9����>�k�Z-��g�!nt0�_��c)3\"`�t�-h���=r��5b�6����/{��%t�k����\\�~3�kn�U��mR���u؀σ�^e�p;����K+���&��Q:ny�^U{P��c&[�^/MH֪n�S���Ҥ�u.����ۓl�'���Cs��C\$dS�U��%��Qr�\0�'\"�7p=Sii��H���&��h�@���� \n��E��*��UW�LC��+��^qG��6�oI�x�A{�ǝ�P����� �-F����M1�����z�&�%�\0�+E�@a�\0�7F���M-cB3F�6 a�LP4��Ř�z�SW3�<�=����D\r�U���]��,�O�f�fggx2ƒ���,P��>�\r��`4K��b��M|P���b�����n���,��N<��0鯌��&��J��j��0X��⫥�J��kP1Kj�nH��(��BLV�-\$#\n���U�^��8}f̱j�BL'��ƾ���&�9�~Zl�(m�P�&(0\\��a�rL.\$�#,��&D�@	��\n��%�/��f����0;�>�Z��^���fu��%:���\r�F�p�P��Jj�T�|�O�Eq*���\rn�pn�PG�JlN�QRЧ ���^�pA*�'��+�0h��A��q�le�M�����%+\\�P����1X���g`�m��BʹXr���h���I�.���>���{�}�l�1������ŭ��M�Q��+���~U�E�,��D�%�\"'����1�\r�W 1Z�,�\"G�.��0�pj䒯�e�Ҡ�\nK+����(-�رjKAT!�|8f���tg'��'�'7'K�#�|��_'��lL�\"f���\".�X�N`&�'����UΒR!�5��#H|M8|���I.\\�ķ0�)�:p�L���Ɛ\"r��x�j�YN`BE�grY2]��1oI�G������;hP3E%j�G�4H.h8�3Q�3�I��-�LyDg�UG!�J=3p�j�rTq�I6�=5��5�7�/7�KSr��aG΀��.\0005��0�J�\r��τ-�FZ��*�C��7p�06��3��USe3kk2�n���+�+��:2D{�K#Q�@E;8�= �6�LY��:�2SWc�*\$\$��=\n/+�/:F��dB��5F����T:#�>4\"t2�R���Tk��>�ʙ��^sb�p*��C�x+̪N�wRB3��4ԑGԖA-\r��BuJ4I(J�*TDtD�z�E9LSIӴ���(p%?t���K�_M҅Mr�2q�~��/T�\"10lGT�O�Ny;2X����>�HQ?�#2���+^���D0�Vt��SB1S��FqUA�JL�R�S����K4WU���%QtU:r��s�9Ӌ9�_,�)�_R��UtG��5=24I%��8R�G�sUC#4�^��UĜ`��	D�l��7GV��\"6�2�CC,��q �ZR�B�Tw�#3�I ��j�^1����/79��TS,�.}1���¾,#�m�\$WU�a^\r�%x�B��-���,�(�gH\r�V`�\r �\r`@�J@���\r��c/�\r��\r � @�b��Tc ��\"\0ĎJ4\n���Z\0@�@�g����c��q�`b�^��&3�[50x�c��ۖ�\"��m�l��O�S2�w��G�Y2:<R�����5�\$&Yp��=!Ln�_e:[5z��CN��FJ�@�\$.��-84�t�*櫣&��� }p��;g�@���ȇ`�u�`��4c/�b�\0g��nq>Yo�p��N�(�^�IKmoxpx�����e0��KL!�cx��U�z��BC�o)_\rU'\"ԉR��)���\0ʌϢ�v��Vj\0覠�HD�W�qK++�4X�^mI\"����,%��\"�А�-V��b���D=9���S�&K*>8 nx\$6��MC�6,\"z#�<p�.X`�h�tq�u0,����}o��x��y	\rL�^�~ՋR��)-'���>4k������j8e\rb�M	�^s�}��8M!M�Q̙�{�	\0�@�	�t\n`�"; break;
		case "ca": $compressed = "E9�j���e3�NC�P�\\33A�D�i��s9�LF�(��d5M�C	�@e6Ɠ���r����d�`g�I�hp��L�9��Q*�K��5L� ��S,�W-��\r��<�e4�&&#��o9L�q��\n'W\r��hc0�C���1D̆�|�U:M��фS�`���X :�qgLnb� �� �S���n����R�I����CM~�1*N-t�'�d����r���� ��h�c�q�?\$�lႋS�8�eN��q3_9���l1N^v��8��\0�´��z��7,p��#�zp�=\"H�4�cJh� �2a�l|\$4�9'�sN:B����J+�􉨻�7��:�c��E,V�E����ƃ|mA���8��N�(I\"��2��H���\0�<��HK*��3��DQ\"����#;�3�0l(�%���.؃��zR6\r�x�	㒍1�OA�a�V��KT��R�����( �p�+2ϋ�����7P�\nb�����(G��qP#z�D�Tj4��xN�Σ+!�	�D��v�YJ+|�V�=o�\"���#�\\�����R����mT=�V+<�+c��0��u���̀:�Lt���H��B��5��\0�)�B3�7�2�93�\$�8̴\r��Ҙ�u��C7(��]	����6C����tT ��x�����&)�#�C+��8\r#��ˎ�F+����[]yS�A��r\n�a���O�L���;��I�jx�x�\r@��C@�:�^���\\����`��{O�4�;R7�<9��/�c�5�A�(�XP�x�!�X��N�������҃�C�R��E4⮮z�״*a�gh(�\$\n0�p9�8@*!K@ڢ�]@��a>��OId��8�:tP'����\"�hAnD��9�ujw�x�* Р�ң	���|B��2_X��1\\-��̒4���A�]��r��VBZ2nf����ޑ��2�����Z�B�)ph���rIT��R��0r0�D9b^LP�@��0�n_�{�rD:�ң_�^e9z���J*�D�Y[C�~�Q\"]���5��O1�Y�j(b0E�PV8j|�\$�x��/BpL���>ChbE��»\$2S���*'鑮�R�Clv�o��C�a[	k-�I����,G,�7,�:�	�k,<��j]]�z_d�2�*AX�FCǦDI�%xNT(@�*��A\"���0��B�6Pژˋ�(�92�x�q�7g��T�N\0pL�L7@G�G�Ʌ f%?Ƥ���Y(��(�i���A��5�r��C����p��\"FZ����2Od�i�RUx�I�3�p�����P���@H�E��HzB1�9H�E�Edc���k�3*J��cS(����>��M��2 ���ab��!�X����1�Mn����`\n\nFd���\r��9q]bU���	����w�2�Q�_�9-�	W6�U���B��sM\$QI�⚖�����쎆�@�C�.'�W2�`�%�d��ت�B㺱Լ:5æ^�D+'�f���HL����&�2�a���\$vJ���䗬��x�nܾrbI\"9����d	�%ɜ�i[���ˈ�(��4��qqѓF���+RL��|2TVE�tSi'���%�9�{ύ����zJH<5� �;�PĒ�5�b����0ő���PԢK-:�7��Џ�F��\$:؂�ъv1�2=���ɡl�\$���H\nL��4F\$b�\r��d��*�WII��/e�#F���\n�d8���f���J�g9����E�rc\n*�ɦ!��Y\$8��	��H�w�����Ί{;E��M3t�49�\"X�~��ԝ��*�	.���Fe�\"�S|�����:B^I(����Q�pn��'��v�L�>\n�nR�2��\"&e͔.D҇����ڄ�����b��W;\\@LX�\"��k��OY\r�����՟^/M�rs�j'��_��A����ƻ�f�s��-���Ul��a�{Up����h%e��2�orӒvF�1;��Y��6.��{O<n,F]鼱r[��q-�2��9��=l�l�)Ĳ�1�L�\\�Aj`��![*�8�E�g�bfٗ�\\��U*�.\$�.����h��mļӵT�:I^16�!�UE�����9#����V�U<�Ƕz:�[�\\����'t�[#�D\n˷!-�4?���du�p�a����J�|m.����P>�g�?��枥��{,ಘw1��-H��[]�m����>��Vm��<����3;5we��m�Oyt��X�?|:6�����q_	�H8q�#T]?a�Ї��u��O�?���x���E�C/��_�|^��[U�_b�P⍂䢎�\$��z�=/�~p�mt�j���z�\r��p ���-j��O02��Vp;&����J\n��ҫ�����j�c��d>�m�`�& �?��j����dD�O&��FgR���b�5��N�,Y\n���L�*�l�â�R��d��\\u���M;��Ī�& �wE�c�\r�V���Ŏ]�ީ�b�`���L�&�\$u �#�ؗ`��Z\n�\\��N腪�	��.\r��[��16�&�r�.#%@B\$�gn�ͩ,1̰Jg�/��1�lZ���n�0h%�\$��X\"���M/�\$��h�d��*񞃫T�1ƒ���_��9���:ƧtHm�\n˴2����-�<\\����/��.������D7� �~#�`��1\"lG���j�=�Dp}���̣��d%�h�H\0���Q�4RC|�MHՂ\0l\"�O��!E\\�h�\"�3c�2�h�%�&�@ʚ��TB��Vq���b���M��R�(q�?L!d,�O�\r#�	�? ������	\0�@�	�t\n`�"; break;
		case "cs": $compressed = "O8�'c!�~\n��fa�N2�\r�C2i6�Q��h90�'Hi��b7����i��i6ȍ���A;͆Y��@v2�\r&�y�Hs�JGQ�8%9��e:L�:e2���Zt�\"=&��Q����ئ��*�EjT����k<��\0�Q��y5��Ǔ�\n(��Sl�L�_MGH�:�L=(����kT*uS���i��AE\\���a�f���y8ALDd��l0����4� b#L0�*`�tb&�F3((�i�����QNj�R���Sy��r4�JfS�xۺ)�h�Sot�r��z�~�\$����6�����4\r��4��0j�\"�bDb�)�����`\"��-\r�*�!���5�����\r�����b%�\$iGb溮��\$Lr2�\rn\$*3V��p�2�Ɂ!,�-2c̻/�c���7#�p��B�9�8�80q�J\rc ʢ(C��#\$�9�1��7: P��J�#j����3��K8�4\"a�.K��;�����ɬ�=C{(;U�k�\r�k(F��7��,P�CL_Xm>�8,��J=�T���iڱ\$\n1@�R\0��#�_�bHډL8�<]8�2CE��ւ.�\r��MRȃ\\�a[�#�9��4�\0P�!苀:&���7�i�@!�b��x�'l�@3%#j�\r�!���]�xÐ�l��.���uZP���\0��xܛ�VB�dÚk,�e�H�'P�S��z���9��U�ˁdTF�ŕ�nV;e�h������,�菱e�(�\nb��A��PD�'��;��x�(��C@�:�^���]B����%#8^1�az��\rڰ^T��������M�}smc+�7F,���}�9蚘�k������4��)�V���;=C��3�a��I���[j2��̢C%ѹb4�@(	�A��%j-�B��b��1G%�-R^L^��j툘����5c�i��8�Se4!̕��2MJ'���T[E�	��bȖW%�\n�28��)�l3�Ό�	�{�:#\\�����45TII9V\r����8G�\"��7�6����8��v�&�F��Q���� ���'��aƒVp�K/��2�@�n/)�,�X2�W+܎����\$A�=��ƳC��:Oh���5��i�`�\r���ߋ�F�����bS0C�5�)%xOK�;%exb�\"Ĉ퀠�����]��0���Xlp\\��@г�ng�����Hzia���YII�'�P�X<YR�Q����Y�;KXN@��>�>�9��d\\����8JM&�\"t��A�Ѝ�8���i�}��p�M�\n	g��FQ,�%[A��҄�I2�#�#A�^�h�ߥ�e�HTh��4ȡ�L����UO���+Ā��aةf�-C�PC��dK�J��s���c��xr��}��}Zk1�A�H�����i�i�l8\0���bш1GP�֠@q�2mSf�2&�����+>E���\r�A:�4C��C\"�/�/>H>��c�ż�Z���ʵU�13h@�]��r�@\n� M\nX��L6���q~��؟��N�m�{\r�.ߣ��p��/7�\\�imD���J��{'��#V����6_2����8S71 �Wk�%���x���֕_Ǘw���7=�Z�\n+Uyg�w���;r��#������v�W��a╄�s��d�7���r��:AJ���N�Hł�Q)�	U#Q�?)�a�JG�\0w��a�B7�Sԣ\"�LJO������3����UJ���+D:�X�I�H�9�1'J�5{zq�1B��\$N��3�M*���y�¶iJ�B2 �W8ih�Fb�D��CT�*��s�,8�H5�#���Δ.u�����u������9��f:�������]3Q��*�]�K���Bض~ɯmJ�R�_�l�Ͻ�2@Su�M�F�\$j�B������cEm�ڴ=�0H\"t��T�����Խ2�А�*�Yȕ8Tw�cEJ�;�4�+\"�ewݡ�fH����C�5;��G���`Z��I[��ד�l��l���+c-y��6)��bٟ����p�����n��巫2t�R}��=t�������\\Uvd���(���.�Nz��7O�����%��V�.�ճ�k�]r�u��%/}Y�D�rS�t��G�pN/	Yo����x35�<G%��Q�`�����ۧ����uFTid�[\"�9Q*HbF�85�<�=�b�ΐ�	X}Li�98���\0n�z����ؒa�I�ej��+㼿��fgݯCB�]Wu���J�O��_�^O9'���������	[��\":\r�\0*�עom�,%o������\n���O4�m�X�\$����2JM���+\0��㒋D��F����\"�|��zS�h{�6����8?�����o��n����(:����\\�FF�MX�0&lpvH�2E�M�Y	�dH�\0��B�C�\rb�3�8�P���x��Ί��0��o&���\r8�0���������p�i�7��x�K~HJ\n����&���/�J�CJ����\"�'P�谋	j����J�x9k��2#�(1)q,5�`�(O��]�n�\r*n#^,pu�h����J��\0�Z�,��胀�F��ޒ��q�#Q�Q��_.�	0�V	b2����Fb��\n��JѠݠ�P+���������������G��Q�5��k��/��E��i�(e�dL�\"O (��F�|e>:�E`�4l��Bl[��g#hkB���\n���Z��H�%/���\r\"N\0\\�x�����޸��(h�&R���\" }\"*\"�*lF�MO�H�� L�0@�.k:�B8���6�(p-�VL1�\"w�&�r�J�N��8��\$7�z��B�%�I%�R��GꎀTh��r�O��i��Lp��,K�ߪ���`�M�&�s/ eB�j�	�3�/40�W�P_�0��`�`�(�-5�^Go�7D��\$F�&r�B�\$PTa4�bFQ�@(B�\0��9b�\0�\n�th�X(�9�XL��#˧6�d dZ��<FC6E��<l�J�@\\�m3jpX\"4\rC�|i `J]>�bD�G4����A�0E�����R"; break;
		case "de": $compressed = "S4����@s4��S��~\n��fh8(�o�&C)�@v7ǈ���� 3M�9��0�M��Q4�x4�L&�24u1ID9)��ra��g81��t	Nd)�M=�S�0ʁ�h:M\r�X`(�r�@g`�\\��*LFSe�f\n�g��e��S���n3�M'J�: �Cjس��R\\��C�v�\$��k'J�ʡ/4Hf�,�-��:ZS+�2���m�\"Ԙ鹓_�Ƴ.3pB��ԇ Q;�z;�\r`�9��m��0�t��\n��F\\�O2�oPõ�Y���4���L�4S�퉃x΀�O���4첾�<�H@0�����7�8�:C��:�k�Ψ��������B\0R⹮�4Vȼ��(p�@P�\n��x4M��BE����b�2`A'\$��\0�\"d�� P����JB�*8�3���\r�P+c��C\$�.O�J�03<�70�D\\��dV����/��\0�,h8��/B���1��<�L�J�5C=��Z)���TRI1���h%R0�o[��>5��2�I(\$���ҷ(�a?���\r��]�z�ְ�Y�R�p6C�P�)�B5�7���3�V�JlZ�2+a\0��\r��5:�)�W���ܩ��f�=�3\r�d����s��l�����;6�:݆�t�9���p�%��R7��܃B�&7`��*�KH��`�#�h�7a�t�Lk�l�!���?�D8\r2(�v�A\"�0z,���xﱅ��ڀ��s�3����<<�BB�Tp�9%���/�HӖ�\0౼p��|��/\0�Ԡc��'N`@ń���#�\n��(��hf � *zv66����G:J9)�,\n@��]'gӄB���|�9\re���)�p�'��(�����ݧ���G,T^.}��9ɝ��q��Ф�k��'�b� �j�0@���]�]�ՈG�)�^!���pN�o�\$��Vp \n�q��`CBY!6A���T��o��I�g��eA��)bPT�j�*^@���*`3#�ƃ�\n3�[�@�ٲ�Z�,ǹ�R���鈨M\n�qH�N�� �Ik|gJ[�>\0(+7pҤ\r�\$�V2��G��:q����r����t�!�#�|^��\r��9%�	�N�y����y֒1<��D��Y:Z�e��z��Hg&��מ�h�(m��C�(d��ǜ'��@B�D!P\"�il(L��4��GCpa<Veb8�O�}qѹP9�	��G�C��˕.v26��Nɦ Ĥ��5ACk�Q�P\$�E�	��453TGp�J��Ή�B.���b��|�ׄ`W�4�V�Y��/��ܕ�`��Ĩ>2���2�OD���PB��iԥ���zUK\r�\"y�3;0@yX\nX��E�\"Z��V^nl����gX*�L,3Ԓ���ʚJf�G�ol8aMKՕI��JG��T�@�a�5��1V�p��-�	:2�֎��<!�32p\\k9}��V�\$*�_��:�Fv�!�	a�q��92AN�aw��]L�����Jf+�R���i�:R�jaM�bCC\n93��Xԇl	'�+��q�\\\$F����HK�U9�����ƈ�sɘ���\"Uu�z�<�\0�B��L�(�����^+�R��<�)�(�K%R(Ƌ�EG[C��.�\$�E\0ap����R����zz�\npy�#y'��&_K�ĹG90�	Bq�9�7���PqISݡ\n@��8.mܹ�T5�H\\0�7\"|���	P_y,n\$����A�eKpVU�yI�R�瑱p�l�.�3q>�Z9����\$u&�����#�,�b�Vg���;���U�8�,*�\"稁���8Pَ�f¬%��fL��{r�P�dv)��4{6�T�7e幨���I9�-#����¹�����R�&��X�U�V����[UhvJ��'�3��9;Gk-��*6E���e�)�6of�Й�-u���OW��d�6ׇ�d��)U+)1t'�M%�SI	^�'��J}�%u'_G�/��G�|��Ht�+���Z�ؑ�pH\0g,h>�`�eX�e<Q\n��C`�.��c%��4Hx+�:p��A�,O#����%�X�4\\�����Ix���Ks6R�^�6��1\"����d��gP�����6�Z!�	%T��I�a�K9�E�qf����v�ͩ�GuŘ*I�N�{<j?�P�\0��|,��'\r�;���e�<�&/�����N�w�y�+T{���G��[漱\r�d�%󗟳 �Fj� �Ba�49ҕO�qF�[�Mu�//��~�����|�\r�+�z�b�����\\�i�>gx���w|�K鯘���}]�owʿ��c:gL�J�}P�SH�*�)��5�:�-����k�\0�p�Bh	�!`�@�0�Ъb~��!��9�pJOP)l�����b pJ��[T-��h� �\0ܵ�v\r��gO%b#L\r#�'�Բ�dd8\r�V\rgX�d�7�ǈ��H����` ��x��r�<\n���Z\r�c� )E����p�ߪ�\rm��\\�mj1��4����{���P��^&@�ev���<�3�\0���0À���%Ъ���GJB�v�ƅ�PD\n� �?ɜ~��%ɔvj��*F� �i�,h(?��1�PC�RbJ/��b<�CP\r�5qd1�ib<\r`�j���=�\"���|�\"�V,6�\"�#Ѣ4�Ϊ���� @@섬\nd�!p��q�<�����Tb�����1���\0�CJ�f!K���'cޑi���Ą�EviCĪK���\0�҆~��\rh����<��J��3J���G��k��7+�=�Z��:1�b\"��@�	�t\n`�"; break;
		case "es": $compressed = "E9�j��g:����P�\\33AAD�x��s\r�3I��eM�����rI�f�I��.&�\rc6��(��A*�K�с)̅0 ��rة�*e��L�q��ga����y��g�M�:}D�e7\$��	�` L��|�U9��E\n��a�J�a��aO��lX�g7G\r�踂�H�Pb��E@�R�\r1����V4�\"�H��\ns:��:ɴ�\n9���Y^ � 4WL ��}��5�x(�e2��[���ra�xd���rM7�/���A�2|[������.i'��M�d/6'��#`P�7�s�؎OJP1���X�b�>؍�H���`��>\0S����B.뎣脸o�ӌp�ހ�#|V4�#�A�Q,O\"q����\"�M��P�d4ŋ�J2�2|�)��T@��0ƺ2�Ȃ3�H8�/�r��7.r��Y��Tؐ ����|9�kB�,�D4��&�D����h�1�Ӄt:��r֏��l�&�b*)�\"`6�oĒ�)�Tg���@��&�C�j2���\"���W�C���Z��=���\0�)�\$B(�P��7����;1�������^�˴� ����#xִ�)��; p�T�l6[�J-{�0�؍�5������J>����5,�v��)��2�W�G\r�4©3Ҍ1���L8�.4��J�8\r0s�#+�����\"/:��;<�\0�%닎:I�L[4-*��P�X�<���@ඎc��(fy��~�@�2���D4����x﹅�0ګ6�r�3��F�ǭ`^-I8��mB��7\ra}f��m\r��x�2��l:82��&�zB:#-�;@&��0��!�\"j�ÿ�[�p3*(	�\n7ڎ3(�J�� ���*���0�+�'I��E�r08t�#��*���-���gk��:�k?2�\nx�*a)3��#�2+2z)��s� uH�ָRhM��}o���ؑ1-z�dɚr���i2�(,��2�L+�\r��20�\0L/̐�������gWF_�Pm ��������CR_,T�*�*�X@eB��òv\\GԂ`Cڞ��J�e0�m����_�;��ڇ�C�\n�ɑ�r@1�\n�܎32��?�T�Tn��0N�޹����T�࢜���Ҭ8���A�cKjщg-h�e�p��^�M}4�Tg��i\\�t�\0��̫\r;��I�%d	�8P�T�*]�\0�B`E�E�6�\$��e��9Rf��	9sd(��3��ʺ��D'���b�cL��\$r�@�bQ��Ţ2�I�Y���ܩ�\0}\0Rc\\���4BPI���IT��PԐ�هI(I�d[\$�l�G,&Բ��j�^�xܧr�Z\0S %X��i@Y�gC�X�@�1+��Ç\$�LP��+��h��*H�rt�l2�����j�� ���P\"�D6�B\"�8���l�(r!H����`��V�i	*�\n�g铭��2�PƑ�8�DV@��o#�.)�����`����!��a�4�u\$U����MQ\$�9#\$�`��5L\r�|�+c]_m+���5\0T�;�V��_c�1�A�����`�*�3*��T�.]��%��9�<�#�~��A���M�kKJ�ߘ�E�Q]K4��`�{�RI)%,�^��|	@wc�\"[Q|��\n	t����s��E.i �#\$�,)�Pq5�����N�R9t����u��\r\$�ւ�Z  )�ܖ��F�uX�9�>�^q0�! rN���>�Yl�Nn;���|xf�E�%��蕄���aU�.[ʻ=2��c�3&t`��yQ��6	+N�Mk7�y�����.�8gvc���M�8ʪL��\r�v�gA��3F�\0(`�D��Йa��/�)�=3\"�L�:j������鼹Hr��j�V��'���ӭ&P�ê�ܝX:�&��y�ՌR���X\$+�\n%6b�غ���%�6\n���e�8���'i��ޞ��?��i����܎s�U��e�n?�I�I�Om3��:Zost}R���84;���G�ׁ����w���*�\r�h������&�v���*�>DV�v�U�<�N���QJ��z/A���2��L�j���`�ڷ�0�U�\$W{�sH��_�z�v�\\J�h7EY��k���:�b33��^��g:j��-��{�X�m߫�>��;�s��������*�X5��;>�C�/y?5��\r5nn��j�'��\\�h���ʘ/~�[�#o%���H�áa�[��y( ޿��41������?]�M�I����k�����;���\n�m�ǿi?f����� �����4�J?]D4J��vc�Y������~�>o����-��9Ď,)&�c��� �d�J���K��\"�>�(�C�ĕ�&I��-#�\$��cc ���;\"·M��%��%W+��-È:��jhi�~�h�P/��Ǎ� �`�`�Xtt�:^�z\n���p`d.b����\"Dx0^�m�#��\rĔ�#b:S��`ź��ˤ�9�pM#r\n��B����Ш�j��EcWd*B�P`�R&fF#g� d\n8b�]bxPÌvQ(JH���8h��B�\">��j#��g�D�V=@�&\\��6�&v�`�mh(f���h�H����ulRc��x�n��lq|1�~��2C�Ml`l̓#�<D���h��Q��E\$.Љ:kd�1b:�,�\n0�\n/I��,�\"�#�`�J&�����1���j�Q�I#����x���8`�8�?���l	\0t	��@�\n`"; break;
		case "et": $compressed = "K0���a�� 5�M�C)�~\n��fa�F0�M��\ry9�&!��\n2�IIن��cf�p(�a5��3#t����ΧS��%9�����p���N�S\$��4AF��\n��EC	�O����T,̰ی�t0��#��v�GW����2e�ю�S��K�\rGS�@e��q�:�k\0�^\rF��<b4�D㩴�]���43�\rHe;d�Ƹl��e3���H(�`0��Eiy�� ON�z�R\n#�M�ۙһy&f��R/���ɍ��pS2�����ã7I�W�����:F�	�z���C��	M���a����ZF��/2�նʓ,ƨ�Z��+Bj�22òF�0�@�\$����*���#h��:�J�<#�v4�CT%ã�<�D��J����'�����H��'O[��<*�!��tEC@�¥h+ޮ1o��5�#D2�&C��4ȋȨ�iP�5�j3�3�0�:��`A�����∘�\r��78#t:���\n�9\"������~����i�2�=_�q�I =q�C�P�����6�F*�TmP�6�c�J�ͣi��:\\R\r�x7�\n����R�6\0B�#c�7�kH:��)�bT�/�[��Q\0�\r���<i��n4cd�'��j7'�j�����7��P�0�H:Yy-l��c8���V.��_C�����\n��#��42��+*5���13 Ռ4�&���}�N��ˏ����\0x�\r��L �8Ax^;�rI1�Ar�3��F�<1ct�7�����/�I�5�A��8 ���:�x�\nD%5�z��I�R�cÕ���ꠧ��0���S���j�6�*���^N\n@��t�V�)Jj��7�x����H��-�<��n�����+t�ǯBx�*�4֔�L\"�#cL�騞~gm�H_��CMN��>����c@��^8�MB�o^�L�W�\"�J�x5,1%��`��Ր \$�D¹��X*\n>GĚ�B��W�FVjԚ�%h�ߓ, ���V,�J�\n&Dq�+U���=@e���F4jII�;�%�B�h�PS/̋8�RʁӍk�:gB�]�m=n�6E��{�I)a�|��b,X;�,f�5.B�Y��	f(��������&%Mb�5��#Jt!m8\"p��XQ/9��Z�C�A�@f+�<3��xN�W�Բ�@��\0U\n �@��8 �&Y\\r���G��&w�从f�^��0V�j��vк\n]ϡ��셔�'O�R)����PK;n)���e�R�� '��L %d�v��0�C�M�c�\$P��\"~���+ÂdY�5J�\rP�yj� 1��4���HO�Z�2^�����f	��@r:�cmI�T\nA\$#�p�����荷������akv�v��!���2<y�i��X\"��μ.L\n�q�췩\n�������:N �v�ؓa}�^d�k����3�H�|�*�P��Cj)+�t��i�����rS ��{\r,m����#��c\r�%��v\$O@�؁)e��<����j)c�\\��O4��)#\$��K`�τ#uI�ΑWP�#qq�J��\0���C��/A�;*�0�,q0!&���Q\\X��&���;�\\Ù�H��C+��'�*�@蝏� \rˀ8ԔATB�\\�VWe �`�*��{�k��'D\$P���\n�	��f����d��<k��0��lM|���C<Y�ʢk�8�c[�4�s��h�f�1�\r�'�D#��a�?��3��/�TeG)�,�~�c��4P�fp3�dE�>vn��vf8dpґ�AO�p\rJd3��d.V���b��f�j�w�B�#\\|s��;E =	���-�\n+�x��oE���&-za�]��Z?��}�ᮇ��]4��#;֋XM0ډ��~�u%�:R����,)��:WZ�]\r{��F��S�G���7v�ͫ��܅R_^�]�v���P��Vi��pL��,��ta��*�y�@��fӓ\$4d\ry2D���u���}op�C��!�881��@�)��Ԉ9;2���S�	>`]����!2�g��r�V�J�L4�@[����\n�Ptz1;�s��w2�?@F�wb���Y)E�/���w�\\�ȫ��>�{�z��[Cm�u�u�\n�m�0g�k�p����wC�hT}���H�E{�N��J��n���W��Ґ	���H� �?�U��1���~�Ӵ�P��wv���v	5�U*��ٳ7~�w�6%�����*�~�����*�9��͌r�%i��*c�He�����9Xw^�M~����7�Z���;tߥ�¡��[x{4k�&#R��0�R�Fx���ź����^�L�ln�L`�V��`��d�+��\0�l�\0�D�\0P�Jh��p�À���B,4��o���]CD2��g���w��PX�@�����t P	M@ȧ/v��(U����ح�vcM��D�w��B6t/���t��	k`�\0�� �. ޙ\n���&͞�b�b��n`㉾|0��^��\r�V\rbfg#z!���L.1��r��\n���Z.\r��rJ�&��\"�#�����d`Hv��^ԫ�PΊ�ô���n���2ABr����n��&���Ա�>8\$�&\"zW�H��t ��h@@���C�����p��\nCR�h�0|�J\r���\nq��L�c\n|���lP#q�ͫ\r�*NM��gC���@��\$\0@�R,� `�<bNF��1��θ1cTL��h	��ej�Gp�y����ψl̪#� �\"�25��\nQ�҂d�Jv+@��L3���G?�\"/Iz�O�0q�����l)���b�&h��Gﲓ(�c�#FN��<�C(�7��	\0�@�	�t\n`�"; break;
		case "fa": $compressed = "�B����6P텛aT�F6��(J.��0Se�SěaQ\n��\$6�Ma+X�QP��d�BBP�(d:x��2�[\"S�Pm�\\�KICR)CfkIEN#�y�岈l++�)�Ic6�d\$B�!Z�-��~䌄�,V}�'!�����l���UUiZ�B@��qA���S�p��2�Q�B����B�#�S���T�Q:�HT�k���N!([��+����{�r ��0�J�@�`4��̖��Zl�I���㯕��ϸ����Z����m��aRO���}dv>f��B�*[\0�H�� 	A��\$��Ϋ	jl�9�T���U5�_\n���v�4ŢJ��+\\8�-*9`�6\"\"Z#�CL��q�JV.�B�lM3\0.�{h�Ǒ�k�*,2%2j\"U!,��G(t4�-p��Ŭ�/�(!r�ǎ�D#�Yb�ǅ::����^�(<D��τ�l(�%!-(|� ,[�/�V�è�6��1\r�*61�#s��A��g\0��CTB-)RB�)s�����c�ϼp�D�� �BJL(����l��,N��I���N-�P��i��*ut�U�`4.�Ut|j�/���E˰Bf�5u���VZ#f��,��h��k�+��Ʊ��h��<��C��6Oo��%I#���-U?p�\\�/I���5��p@!�b��T�0L|@���T�˭AX���s�}�����N\"f��K+���*��u��r���L\n����s9l0�K�Z�'���,x�f�ܙ�j�%nt�D�Z�u�8v��Bh�9��(���;�㔠2���9�&*!\0����D4����x�υ��6�#v�p�8_��c��7cH�7�*0�C8�:r��1N�a|\$���26䣠x�!�9�@�4\r��7�#H\r#��\r��#���4.�ZZ���3�!Nm!�H��OkX��h;L�AC\$�帋JA�)���,֊U�ɑ4)HݗEVf�;mgI���ͱ�2�%_\r�L�R:�L�n ��RQ,�Ȗ�&(Q�[`yvBXNhI��\\�g�IQ�:������L{	��&��C���� Y\r��)�L^0ot@�Ȇ ��\0S\n!0`ҦA\0v\r.D#@�rP\r/½�C�o\r�m�gN�V��W���&g؃�J��d�	�HT��]Ͱ�0t<����RQ����(䒔k|3��!	�H1��Qs@���VG�91l���5d5X��l�9>,l������x(k����R����L\$dM4���OI�[�cr �B=A�K�e��S�F���O��&dޡ���\0Q�Q�T�3R�+����s����\0U\n �@�C��D�0\"�f@:`OG��/�DA��'e�3�%bQQ�@d��h���34C�i �?%�ѧ2�ld�/�0�8d�j�t����1t��D�(�L�r`�L�Mxx�(�OS�@�#b���/T��Ò{��X����A[��s5d�3�3Yk�\"�\rq>2@�f�\$��g�^i������-#�����dB���Z��a-6�~�:�v�,�>���C�WQ\r8����O�[9d��T��S�ƕ�<�J�\\�ϤX��1hd�\$��M\n� F�\\�ul�Wk�\$G��6\"���2��k�p\nUȷ׆I�X`�/0Dɕ��K	q0�#b]]sӪ�!85\$`H��k�n\"٣�v�4�p��Ar{SNa���d�>Cp�f��\\��8�/��� ��;�����k\n�C��b�R� ��� \$,t�KE5�����P!8'б�c��h��\\\r�C\0���r\r1�L�����`����P�r��S7iX#v�V!UT�4��x��3-9���\\Xjz��bt�*���;9Ы���Tu��Z�)�0���M�kIZ��heP˦U�%E���H�	�e��'�s\\[�?5�ҟ�n��p�3ƈ��ĳ	�T�AzN�W}t,��\"!\0���SG����2�C�1{�ܨ[2�j�����{SW{oj[T}�>��[�_J�B^q�U��RJm���\n�Y3��	��>�޻�}-X�4u9��Ԥe�j&�^��\"��Y5tn\n�Q\$�ɠ�*�DE<T�3�1�x���B�/�\$��FF�g�\n��o�1a��\"�^�[�W1ؐX�譪A	Q�F�����w&�K��rY�X��5H�`Z�ͨ/�b3H���;��a���XjBg�=Ѽ�u\">����v��t�nY0}t������5|'�������4���k�/���\"��ZJ�E&,�T��0TzD,(�Ll������5��m�=�f�z?�{�sl��S�|)h�ė\\�`�I�X�o1�~*c��W?��Xj%\"(?ZW�4������s�K_yO������G~���;����!c?�ޯ���j/l掌�+*�������O�诅o����m�7�j#6*��c�@Ôb0\n����G�l�c���\\_pN,�Hk�m�N�,t�E�`*�g��a�l)tT�����ij+'ҥ���\r���\$�)��\r�0���иz�\$\0�84�r�bJ�D�����m`�@�`�\r��`�f��� ��4�\0�z����{��|����4\r��o�@E4t�\"\n���pJq\r��|����Rm,��P��D�*~���kC�:ь�1D��Jд\"T n��h..�2�z����s���J숂>X\$�B|*�Xc�R�%\0`/>��	���J��'�R�����Ee��`�F\"6�g.��1ֹʤ��j۱���䗃��ɜ���m�^P�����-\0��@�z�ʱ d��\0�`�G�R�K����㾵d�5��~�Q�B��\nPʪ�\n^��\"S�HB��P,�&2�d8�xU\n�7\"vcF�.k���/RX��,dV%�]Ķ����+\0aR�*ݭ�H�.`�ꪅP=1��ڬoʲ�`�N���O� ~��(B�c�>"; break;
		case "fr": $compressed = "�E�1i��u9�fS���i7�(�ff�D�i��s9�LF�(��'4�M��`�H 3Lf�L0\\\n&D�I�^m0�%&y�0�M!���M%��Srd�c3����@�r���23,��i��f�<B�\n �LgSt�d��'q��eN��I�\n+N��!�@u��0��`��%�S#t�ߝTj�jMf�B9���C����0#��N7�LG((����iƌV�C4Xj�h�n4�#E&�a:���]�V�5�a`Q���R�Tp8aۋ���xPQ4�N�\0��3�>7:���:8�s��cK>�2L�A���(��#2��+I\"2@p*5��tԎK��ڰ��4�)k.���7�q�B�.�#n���`@ꍎ��B(��hmF��(2xƁ�HK,KR��\"���#3��ή8����\nS,@���rP�%�Ɇ\\�B��+���¶R`���(pϯ�*L:�c+7MPx�:���Ɨ�c�:���a�H@)�\"b�:��l2����0�|�'C\0���)R��M5@��C�7�j���J�\nv��`\r��~�ăt	a�B���%@�ޣ��X�I�T��J-5�p-���t��.��_0��o���d�L2I3\r��7�u�@!�b�����\$���ߌu�Z ��(�%cm8�����7�3�,C��p�5=�\n��\$X曽�-K�\nG�C �K�V��Za�̈�eЎ�*�L-(\r<\n�����?����C�2���x�\r\r���C@�:�^��(\\0��j �%c8_Zq��;5��<9\\��/�k���JI%���^0��\n�A�v7�\n\"���p�ꩼ��3Ȋ��V� ���O�hA\0�\$\n��8]�0@*!M�����\r�H��M�yب)H�6�	���JL�i�����t:��\"Z�7��xS\n��\0@���c�PT�Ca�r�S�ৢ7�BH8 ;媳�x�\n\"�?%D����&%�9'%��70eQ�{��@�1�V�JA/,��#G�J�|)�4��a��=&�����.��h,�ࣰ����3�8�W��mD�\$&Vķ�T<[h\n0��Lz���\n�R�HHp,,��T�<�9�Fl�������#��N���yZ:� �RU��H� �@��,�*)�0�hZr���	(l95�]\"��KQ��\"Ra֫ZK*`���Q\"�]x���59#	�CI'Y#���_9�:@(��l�C,�	�8P�T�*q�\0�B`E�I\r��P��p��M�B��*\n��5��G���}xp���; ��\nЄ����HfjgܺFX�Qmd�A%��D��d���{	�)�2����[K�q%`	5Scl��TxA|/\"6�0xGh�cr!RV���\0!��b���4��#e�-�1ޅ��mP%�<�.q���Z:�bN��\$��J�xS��4;sf�)�#CD�c�]]!��!�5�cω�6��9�k	M7��T(�K�auK�`�s��,�8)<T��pcy��1����,��_���S��UJY(^m�����ۚIhJ=�����xRP��k��\"og�ڧ�Wr��e�l-ʶ��ѳKx��˂�[)�m/Y�Ux����t.?(|�=�����Xl����Zĕ#{T��do\nцS���Ӓ��(����Ӓ2{OxF4���H�{��W��&�Ģ���J6� ��QO(�-a�A��Ԭ:HIXt�FQS��j%S\$����!�NȷO)����ڬ\$ɳZ3\0�uVa7�y�T�ԡ�=�h�.2zW9	���C�Nɦz_��Z�ś�*�c��F2 _���Fq�&袷��h%���R��Or9Sœ,�L�ug/z���0�����z� �]]����V5{G��Y'��H\n�Y0\$A���ԭ�m�j�h[��-����\$��YԜ����5�`�T�-G'���H�PS=5\\{��M]_��th%:�Qo(�5.�����oŵw����?\\��\r�B������}���xF���oH��&���(�>>��7Ἐ��S���F���&Cm���_V�^]�m�ϴėX�r�yŁ�|�S�k��.u��n��.�N�O�Sb��G�u���;ڱ͑P���E\r<?�������L!K3~xS�b�%uH��vSKtoX!��Jk:��s�U���6�O|N6�7�5�SԳ�g�'��\$G 9�.ш���%���n���xL:���r�3O�u��.�!g͕^�U��W�/��Z���ڸ��ڟ�E��_�_s�\\b�k�p��Aհ¢�d���#O,ʿo��n��r�ڰ�s�w.W�V-��_s�H�3��O�����aCl\n�0qcl9\0���3�P+EL���l��nrqo��\r��\"u.�����.�O��Ϥ��f�\$~&�ҐH��8�D`���Tҏ�^�Kh�@+��c��LؕU����2:���T�-�S	0��,��pR�P~/���i	Р����p&���ˮ[�\\�/�m��̪������έ0��L�|\n���ː�b[	o�\rOz�����D��\n�����֗,�6\$�E\$��ʑ\$>K&�/��,�#�+QBn	v�K\0006�;JƑ�� �\"J��KB����IM�R~k�ӑj!���A+:��f3���u�\r����T6�>�E���5���(�:� �+��il\r)P1ɝf4RB<��\$�BlL��v\")��\$� ����Z��J�/���P3Rz,��t(���R��]\">\$-H?,�am��-jQ�6��[*>b��^2F\$R:r��+R:!C�UQ�6�n��B�G���q �vKx�fYE���6q�0j�(�j���B�3�8�ȸ�B�)Ѻ�E\n�JX���*�I!���&�+Ҙ�Q��MP�+��R��@�b@ޡEF�5r�я�:d��@�\na,�>��	� ��x�D�\nݳڭʪ\0�{jlc2̓��b�\r<��#qH�1Ы2<~	0�*M ��X���Ʀ|n91����60.��\np�	@�%j>A��Ȭ��D�0��	\0t	��@�\n`"; break;
		case "hu": $compressed = "B4�����e7���P�\\33\r�5	��d8NF0Q8�m�C|��e6kiL � 0��CT�\\\n Č'�LMBl4�fj�MRr2�X)\no9��D����:OF�\\݆���Q�)��i��M�8,�Bb6f���Pv'3Ѻ(l����T��(=\nipSY��r5o��I��O�M\r�\n�b�\\�����~�Y��JӁ��S=E\r��\$RE ��M&F*D�����pTLr��o��ф�\n#�d��A�L��:�'8����Q���6i/�j��J�_5��Ӿ���es��\"���֭A\0��B��9;CbJߎ���5�E���	ʻƥ\"e�H9�ej�9�¢(�&0�?�n��M\rI\n�����3�\r ���ɡ�\"��HK!>�܍\$H�P�4������5�cKP5�<p�h���D���C@��\ncx�1&*@ܳ632ؕ�p�ށC\\ܫ1�b[8C8A5k�&����6)2��ͻK��c�77∘]6�Ck�7,uJ�9���((�Q�H�Hߪ�lSY��el�\nu�b��#,�آ�����4ń\n@�4��8�:��|�\$���ܷP�<[�d±I���3E��C\r�X,S-u>��'[IK�a�#��T��b��#&��7W��fZ�6��]\rP�Q���o2���2m�ܳl�5�52��hP��\$9�8{��*�6.�Ӆ��� ��#*n&������(ԊA�`@��c�=@�8A�㫐�`J�\n�`���mi��P/c��7HC-�4�&(&#B�3��:��t��^Cjԍ�p�������I���(�J�}n�d:�x�1h��5HHu�u@�WHPݒ��Rٔ���#}��*ւ�c�@���B���E\r�3��@@(	����hs�)�Vt6��z��50�޾^�ޥz�bˊC4\"P��2�+A��@tbɺ&Fl�3rbxS\n������yU��!\nې�W)P:5��C;�/���jA��VV�U����A�\r��:��޼�pb\r*)��d���&!*>%6����)N�3\"J�#�l�����y�(%=y�'��xb��0���I�SW�F�:k,ŷ��lO��ipa�&Y!\r �����S��\n<�'��<�!D���aI8FP�\"bޠ�E��\\\n���\"�y`��{6g���\\!��G�Y!FU�\$�f��Xu\r����\"���AD\n�ʧ��J��\"73X�����S�	h*\"���T�Dư����xpK)l�R���\\5�L�B�Y\"F�Ȥ��U�\\	���'�^+Oac����A'3�\\2Ѣ��Iɭ_&\$2*P�	D��n���\0PINm�Sf�b(�<�\$��CQj�i�I�p�<əd��u��NB^#UB!���{`\"�9[���s���\\K�o��z��xFM��ۀ��=�R�?ﭵ��s�9�4�,YՊ�(j�֫��)\0���� �q#��ܒ�pr�X��	b\n��g���v���t��j��F�Q�QYq\0��kQ�I�S��û>�C\n;�e-!ZhEjh-���b��;8d��7��0�Kz��9�xw���Am�5����W�B��y7����5[^��s4&h���HL�e'd��5{�#U��l��KD٬1�R�b�\$��4�vnˎ�<G��#z`�eE�,�r�f�a罁�{a扦�R8�m.�,�OÁ��k�|�!(FSd��Äf1����Ȥdg��>HZ5���y��84��*�	m\r��8U/vՊ�R\r=V���=�<x��cb��5O���4�ÜA�k<ذ�������ɤ�w�r��S%Д�a�2��ŵ��R�F��sVq>�����-�y���)e��w��	D�A��y�=U���}�7ɴJN)j,��;`�	MY;Ev�k�e;��aӄhF\nH�W/�U���N�ګ�;�fƠu�Fi��;,�b�4y+�[Sr�MA4Ll۫7t,m1S���Z	�o�tg4sV�L�+�t���8a����>p/����t�X	��_p�Z��Ϫ�^�~5\\8�g�܂���#tn����̧��#Sf�u'�TU�	�1����\r-����&I���W��  ��p-��`sb���@.��U�-L5��c�I��}U��hKY���l٭>wW��Y~�*u~���ni�!I�N�29��:�G��@��ʜ��H�NK�(j���t0���8�zm\r�e��4�'���c�tr&��M�v{\n�����т=-��(E����RUo�������[���\0R6-E��9%�9���[_��V���s�1����\$��C���/տ�p���M���#-b��.�C��O��O�\0O��C�2�2�^��RK�ڊ����ߤܫ,���&�'HB���*�X3��-��̥P[\0욝n��pY�V���*��FB*�#Op�bC���\$\n����L��K	p\0������b�j4=C4���c1*������=0�=���n/@�zϠ�e8��h/,�&�?��@¤cL,K�􏂔RbE�ֲ\0h�j�\nDQ��'�d��n	c�b\0�l�l���d���9��.`�M�\0003nH�+!�Z�@�B �`�(\0�f���N\r����[ �\r �zC4(�\"C\\)F�〪\n���pzb�\"�����Gz[��/�H���_%�il#�B\$h�������\n6��lj9�?aBգ=b���0�q�|���\n�V��<hw���\"��&��;�\0���D�	�p�:�6\"D�R��E�:Ç�o�bC��9�.���B�\$���l�L.(f�lzƈ+L�&�P���'�,��l�rs�m&E ���R�`�^�'\$<f��rp2t�O2Cjj�����]'\$�S��~�ܨb�R*d��QE\\)Rc&jZ�^�>���\"�Y\0�F����	P�E��\r���Dl��bQ�e(��ݨ�N2{`�V�HLPH�����\r���g�\$��7cz�f�i\r��"; break;
		case "id": $compressed = "A7\"Ʉ�i7��ᙘ@s\r0#X�p0��)��u��&���r5�Nb�Q�s0���yI�a�E�&��\"Rn`F��K61N�d�Q*\"pi���m:�决y���F�� �l��hP:\\��,���FQA��	�A7^(\n\$�`t:����X�e�J�J����Z儨�@p���H�S�h��i�����gK�����SD�G2��CH(�a3R�[+%X۲���%\r�e82qHR��\n�\n&ʫ>W@r6�#�����i�w��τf���9eS�6�r��?�\n��s���#�t��	�쎈PȒ�K����\0P���( ��ʑDBx;(�p��	\0*�C�����p��/�ڥ=���Ԫ,Z � ,؄ CJ��`@64)H��\$�B��\nb��J�����?�*l�Fs:5�렄:�Ü���S�4���4���r^2�BL\0�A`�D	r����o��(�����Ms�;N TCch���!�b��!�Ή��\0�4�ch@:���̱+x䦤�C�)Ne���@֎i|�aF��`4��`�g�9��|��̲*��JX ��}X7U�xȖ<,jNϥC��B�(�\0��x@ cDL3��:��t��(Q�ܓ��������,��^I��2��(�1W#XDPÄ����^0�̊7�\r|.:\r�t�V#O;Ӊ�I`��c�r��H���쮚=����(&�˲2YI�P��*�����p˨3c�������J�[ ��v����*5�b��K�@��#]����@(	☩���2f�W��v��ϒ���/:M�3�\n��+�p�4��!�B��Čmh�\r����&<�P(�*k�YC�HҕގN��m0�)w]�XzSW�=�6uaF,�6�A���H�S�3꿴���,��f��y(-\r�2:��?V��6���\$f��ڹ�<����D`	G:������\"\"\n�����T�SOOYW���Zԩd%�,�4�w\\�''��@B�D!P\"��j E	�\0��OH �G\n#D�`_Ke7Ft��ja�pDJ5�.\0��\"�d��	'�^^`�0&&�6��U�(n �5v���ፊ|����dL	\$#&Ҋ�\$(SmD��2��HJC�n6�P�aye,�1��(���5�ִ#�BZ��9e첖����\n\nH؄%��cCI�8�i�:B]�R�0�Ƞ8���YBФ�BĲLÒ�t�w�g�)�#�44�%\n:Z(���S���I8%�VdL�4�q:�Fu#2BQda5Ky%�P'�P;1���:T� Q(��	�c�l�\n}p'	�C�9cy���)(M�m^a�2�(n�M\0���\\�\n�Jqe\rH\"�G�V�\n�S�����5:��vV��<�W2�EhO�vSPi)�J���q�XGI����#&��[��J�h�*-f�FMUL�ֶW����gHʸ�U���n��KX��򔧕�A�%bR���'d:�y��*m=\r)�����F��h��&Ѐ�9&�ɪ��;�X�j�������ȡd!��604�RFf� �p�L0�EpHdx���v�3��U<���t_eD�n��'��}�3F�Y��x_[ܼ���M�[g�-�.��8ۻ�O̕�7L�^e��唲���\",ʑ@���D{���7���ͨ(f�	�!\"��jW(l�31��i�0d�A�N�\0�Z��t.�F��]K�\n�L0ŗj�_� U����́9kV�w#����p@���d>�++��r9@�\$�%��\n��E�ȯm��PԘ��\rZDc2oMAnʎQ38؛�Yϒ��^�����Ư~�Yt��n>���>Kc�Kt���:\\�#opԖ�KKh�>K\$���t���iåK�MW��t�L5k\$-I_M%�鑓�Q��\r�ڝ�4����ai�;!� fD�P����ޥ#[(�\"){��~�3���ܚ^B!'d�^�,���q����s�<�`&��x�H��\nF��X�m���f�^���id������м ���'8n���44�-��PpW6;Mh�tu%���ZO�\"ﻭ���܋c^x:�CgR�Z��q`�c\rs/l.�[�PS����\$���\nYh	���A���tH��3hXc=ጊ��n�fIQg���-@��	`FPDm�n��\r F���c�G�^��^��\"Y�	R˨q'�z�B�Q;�Ի�8��U6��f��ݷ,*�%�40�H5j9a1ڝ����dD�l�,n��Vq�[���=Al��@)&��_s�L!��˟���xp*G�6{�1��fH��9����(MY�&+��N9���~�[�!�H.M/J[�3{�TY�e�	q���9����b�=�x���}LȰ��I�FBI=��-�A��5�Њ�5��1�1�b\r��"; break;
		case "it": $compressed = "S4�Χ#x�%���(�a9@L&�)��o����l2�\r��p�\"u9��1qp(�a��b�㙦I!6�NsY�f7��Xj�\0��B��c���H 2�NgC,��u7��F����n0�D����b��%��e|�u0���;��`u�O��ڍRi67h�:M.�P�U��ZT4�0Q��铰��[�R�u�DADC\r�� �\\JgH���h2��U���R2��S|SXi��j{r\n)�NGnU�;�(N�gz�G��ζ\$�W.c0��a��%8r�&��Ĭi9�\r����`d�����5��聮\"h�2\r(��ς�@�D�,�B������#c*f���ʷ�Ќ� � @1*��Qb���)Ē.\"2�� P�3��F�hs��+j��8����9A\0%(�4�<��V�/\rx����G��t������#r�ͣ\"0)�\"`0�\r�6�,�o�*�B�&�m��!�I�SE5TL<��(\"0j@�BH�8+�x��\0TB�!�jE\rB�:Ҹ�N�DQ��iǋ���B��5��\0�)�B2��ϯ��\r¿�b`��#J�0���T��0���n�@1���1�#�޶\$1v�2c,6���,��VҪ�E�����!e��Ȑ䚦5X�\r��`�+�O�?��Z&�J����(*�%!�`x�\r��C@�:�^���]�\r���+�8^��c�����xE4�;s���7\ra}O	>�|��\r���(�s`	^@�M��[���/<�.�l']+�+�+�0!\0�\$\n`�8T���\n0R��u1(,z	�0O>4ق����0��0�� ��ܰ��#/��pBx�*Y��Ӂ�W�0˵<?ӄ�c!fcL��܃r<��R\"n�����:�shAÍ�~|EcH�N�b���\0�*p���O�;H莠�j�9��Z�Pq/d��[��[��g��˒�j����\n�2�\0܆�±R��\"�\0ܹ]�cj�O��qi�+�\0��:l������)FG� �R0��*�H��Ĥ�zL��W�cR�R\njH�ĵ ����o�g��ph84�1���\$BH�<'\0� A\n�F@@(L�����CI\"R,�Q�&nH\"�2)�&%�`�#hpG���v������&�e\n�+6�\0006�\$|�J]0E��&0��\n���\"Tb�*ݰmCG鉛`�V�o{!�)�܂B&P�~``��Olmr���&9��!�5�3����*�*�����'�|�M3t�֨�Ñ�(�Ġ�l|U�6A���������0��&�T4���k%^aʛh�+p�Q]6\n�\$�^�	A����a]&}�.���J!�Y��/Bm��|���l\$}%'k��3�Ia��NN��\"0�R-��j�7THi�K�\\�u�\naB�-O��:�2v��zԏ�X��cXH��|d�*B�K!�p�B�\$%\nT�i�\$`3�:�A\r�#������C�s����J�5\n\rqZ��(S�JQ*�\"I�&8*����FҸY��e>�ͽ�Z�#ױ+���ـ���ht\$�z'��PZpsl�\\8(\"B\"��MK�)��r.q0�l&���i���%O\\��I q��Y���I�%�&���c��0j6���[z��|B��^�/]���>�&t\0�e�]�\$,�D8<�M������� �|����^\0P\$2_>��?�e\0o=p�+;Ê���\\w��b�&N0�pbP+���t��9I�8\\2!=��H�c��Dˌ�3��q����i�\r�ia!S��r����X�R\nl���ʤ�P��D�6�*�f���e��-@gY��3����`&U�v{+�ri�`ӑ��m(�^hp��0F_M8b;���t�x�\$v�g�0�\r����h�J��.�A���Y���q�W������P�\"nP��D���R?f�>!;��)�C#^�v��J���:�b��?-ɗ�o�o��*��n�B�L\n7�l�6�G��yu�:so>r�ݴ�c0�M��x'\0�\n�L���E���<��������\"�~+��!�7\$��@�zW�	֛GŃ�ʏ����&�şo�~|Ì��E�\$�'�V�:��f�~s�/��t)0e�����j�te�rݓ28�tz�z��]C���'#�Y	�=���wL�=U�u~��;�O6�{v^���Y��r-��̟�H'F��pX��L��Hm\$P�?U3MfuW�A���H#�b2��¾�K1b��y��%:G���{ ��9�P쒥*+{(m�I!��3ܷl�LC5���3��]s�K&���?���ͦY4W��(U\n��������Y����I��_����qKh=��䌒�{0A��E��\"�m\"8>i��	��\$**b0�����P6���.8��`B�%ǴEK�^�bJH9B0�00�M\ni��]�H��!��+*x%ˎ�\\^�R1G\"\r�v_�V�D��\0_��2Pk0p�Pu/\0͋�\$��M>-�up2>�&�Z4�8d�D=����P��K�\\���PI�\$��eП�\r\"�4GlK�|,�\0�x�z��\"�B�n2(�9fA�O�L���(�����.j>�8Bd|M\$<�F�'(>b�	\0�@�	�t\n`�"; break;
		case "ja": $compressed = "�W'�\nc���/�ɘ2-޼O���ᙘ@�S��N4UƂP�ԑ�\\}%QGq�B\r[^G0e<	�&��0S�8�r�&����#A�PKY}t ��Q�\$��I�+ܪ�Õ8��B0��<s�W@�*TCL#�i\$\n�AG�S�,�ƀA���B�\0�U'�NE��ΔTF�(H2j?wE���dZ�ʼZ��0\$�M�_��pe4PA��:�Ω�Q�c�/)@��u������kPs�a\0M9�ʗ*y=J�+iy�]J�L�\\�d?mʈ�G{�\rUT���h4Dq_rAV�Ѵ�>U#��N��#��8D*�;�Ԑhc���A\\t�,R>�Bd ���H��#�ˑD��z9	9�ʨ��E��Y���ps�Ή4�8(�i7Dp�AЙ_��9t��I��+�I(\$I�M���T�+	],�r��P�96W3La8s�\0� �Q�[�I6C\"C @�*�a�@�1�\$�Ds; T�CDpa�R�9hQ1e�vs�{��C�2F����[R�\"z�<�C4t���d�d��è�6��1\r�(@9�c�\nb����h�<�Y�]K3\$\r<r���P�aR�I-K��A%��=2\\�Ҙ�d��_��))�t�|I�L��8N�Pb8@Z	df�ȉI�`���\nQ%7N	\$����]�UBP�P�:LYpF��kV@�B�)�[�����r��!\0@�	\n�5̓d�UR�#���]�H�dA�vm7� �d[kh�g��Z��#��4��� ���\n�iQ���E���h�c�iVY� �]�ȱ��0�c��9�9��x�?���4�C(���\r���C@�:�^���\\0��h�7q�w,3��(�ޏp�9�#~W��3���P/�0��H�8X#o|:�x�6��:\r|�:\r��5�CH����m����:ϴ-�Ү�2� ��c'\$�\0�[�4���\"\n�&f���c�}D)l������d,���#�#�{�4����G\r��C���Ĉ\$�@��'�5�>Ί�\\#�Q��_5����6uBxS\n�!MD	7\$0@��΢��Ce4A�L9E�K6q,�%�\"�	��B3����bK}o���A�\r��:�����A�3��\0f\r+`���0T\n\$7'���ܳ�}�D9�ڰ�xvw.	�����IL����\"��8�K�����X��ac��\\.�T;{�M�>1`:4K���%�Ifi��oN%P��F� ���S\nrظ�vB�sS�TTJ?�Qh�5<� ��@����)�ah�{�����DA51J��(�R*�r��<G��b��]K��G�z�N�����' dF�?��^��#��Xt�2��	��B@DQJ,�xNT(@�-@�A\"���Ra�Dh�r��\r��l?j�Y6#*#��J8@\n1�%O|��@r�H�Z(1y�U�ʄS*:��d��i�K䒨��,(���N�^ę�ؗH��F'��d�O��\\�v��ZoHW\ru^�I��?B�YT>��AZ�b��w#��u��\\�C9?'�zR �\"�-�]/a6[��\\�!���HBU�n1�@��r�cl����i��b#�|TӐJ���?�zܜİ@oK{����/�C�	r�7�\"��[#�dA-��Q].�@K�wo�����m�)Wb�2\r��T�!�H���A�1������5�hB�����1�h�J��)�V��\" �M�_�1P9�!k�ht���p��\n�1d��M�F)��bs��t�C�X��Z�G0��G�%ئN��=��К�dC��f^�+� H�gM)��&Y�a�z<hQ/�jV��\$sh�#c��2����i���5z�d(d.9^��ө�����l-��b��ÙH�L��ǭN��)\\�[�.��]��0��+�����h��b�e��m��ڻlj���Vq�V�iA�E�\\D�����[4U�7�Sj��{���5Y�����ݨ�v���٦3�yļ���	�HF�Ֆ3Y˝��K�И\\n[�t�T�17ڄg��-c%�kn'Ʀ�2\\�j�>E�&:�<�m0�HW���ݐ�[B�-L��:�����(�����\r�ϷIc�e�f@�����}���6�I),l~o�l�W���RSN�N;���VIoeH���p�1��V��w�%�l^�2'nDy�LK�t�6Z�f�*�Y�.�,��)�jb�\\+Ł��拿��2�x�_{������\nI�%i[�w�߷��T�}�|�_��e��_[�}���h��[�����O��kLE�T�������>a^#�(�1D\0ާ���m������2��T�F���P�o�Q%;+�k ���jc��f^Lp0Zp*�\\�bYc����>N	�N���m�0\\���O����u\r��P8#�|j�p����M��n��y�o�9C�9Ö����͘�pw\ndB9�Ąд��^�˱�#�	��\n��C�\nKV�\\�M������kZJ��D,i\r����c�E'���d���l��>�0]��/� �q��s� �+���m��a0�A'�R`�,�(x;�Gl�v3�nT���/�.0v?&�C�pR#\n����~QO�O��M�;	-�fP\r�V`�\r �\r`@x����\r��XG�|G�\r � @}���&X@��\0�}�\n���Z\0@w�� �����\$�`f�������J�����N��Q�D[�&���\$�e!l*�,�Bz'�0 ����v��Rf�\0�rń�E|-�\n��j��8�f*\$�P��X�\"��rN�v�k*\r��l\n#�(.P�\"���@�\r�\n�~X-L\r\r6XQ�w��\0���G<~���\$»ﰰ.��f�R�%H��+t�np긱k��-(̋*X7�<�\r(�Z'�:���8��(bV�e�Lc�@�R�)�ʪ-\$M���%��%#�V��*���E�+�	p{�>Pl?�\0�bz�ʬQ<���u2�t#\$"; break;
		case "ko": $compressed = "�E��dH�ڕL@����؊Z��h�R�?	E�30�شD���c�:��!#�t+�B�u�Ӑd��<�LJ����N\$�H��iBvr�Z��2X�\\,S�\n�%�ɖ��\n�؞VA�*zc�*��D��\r�֊L�����=qv�kGZ�)Z�Zg���\\;�K�	X�M*dP�Z\nF�&R��(�����e1�vASb�+aN��s��0�Z�qO\"0V�&7���#��aژJܑ\n�\r�X!N�f%<�v%�b���B@�X��1�N�rY����U*e�ޚ5aZv�4��+\\�d[�v��d��+�붅3�\\��Y`@e����N�����C�yH��Qnē��X@�E�P'a8^%ɜkE���?���	`�e�>e�\0����/�D�&2ek�T�9������ �Ĕ�22I����Bi� �A؜.S*�!��A�.�TT&%��eX��QNP���&�����\$�ʡ;h\n@�è�6��1\r�(@9�c�\nb��\$Ii@\\ю�A?�,5���]\$�e���Hu��D�b����e٨�lJP�~��OYl����?\r�Y.�/�J;�,N���'/k�),�d��!�p�:�B���.V��f\$0\$�9�C`�9.K��]�d�f!�b���ӉX�B�JK��iA�9�:����M�p#B��Tߴ�CRյ�lvg��Q��\n�f�Q��\n\"Lbx�mwG P�0�c��9��9��x�4���4�C(ɐ��@4m�0z\r��8Ax^;�p�2\r�Hݯ��0���w<k�p�4��pER�#��2����TU�XD	#h�T��h��|ׄH�4\r�@�7�#�U\r#�ï��wT��L�<��-�.��R�\n@�̳u�@*�MƏ<'as�K�7K\"<��~y��S,�&Р隐�)�<\"�&��J^#��,��7O4��^:��H.�S���Z�	�L*\$�x���<�V��/^q����Ҟ� H����bh��@����RT[ڤ\rg�A���A�\r��:�p���rA�3�b��0iU �;�����Uɠ4�f��� ��7��V�ó�jmU�B5��V_%���u��Q	�����@' �7��7����JpNBu���%S�ΐ�b<05����^���3����>�;�� S��*�!��TU` z/Lv�W�U!D���� �Y/3�̇�P�Ī�Qe�z�����`�65��)f��\$*}�<�zo��\"�u�g겦D�A<'\0� A\n�u�ЈB`E�j�!����HD�V\nH�R�+I�F\"]Dx���N�3����[\"H��(:�H�M��k�iN\\��v���q#��&�|���d�L��J;(�g�A�!�+NKO�E�\\���\">RU�H�aO����\\T�eN�L\"�\\�eAN:l�\$�d��j�0\n�\0	F(�@�gn#Ď��7Ƙ�e���`�F���.x\\A*hS���U�G���0p2A�!�X�2����dDI&ҕ���A�H���	�Y{`�,)�v�\"FV#����6M2NJ�i/&'@��)��HH��vx��aJe���2`R	�V�q9Y�0�	\$s�z^\"\\� [ �W���^\"\ro�丶��N��@�\rQ���H\$ɰ�Lgu3t�|M}���:%T�h��;i�K\\�jPe^������,����z���i��\0�b��sa�R���^T��4�EL�+BWfqC��JX��6��C܊g2D�dP�N�[ȵ����Q�z%�΄��>fe�4��6c7���e��\r.U�-�ľ%�&WNlΫ���._��W�Gݜh!��\$�m���zŅ���X�7�p�r.T�Fӹ>�'�(�Hp����w����l���({U�g۟l�jB���c ��\0��[KI��vp�\r�{	�iX���jj[.J���_�C�Z�0�as'�a��m&���n��Go�z�bf1Ӯȯa�1Zw1S�Vgm\rͻ�Q`�?�}�Kx\n��KC�ԙ���fo�h��Z2�DzH)r���R�:�D~1�J��wYf�\"T�GI@;n�tO������\"�\\`���J�` �xJ�[�xGZyw6�j|v�������۲�|(��v?���ָ����[�-����]���v�e����훬��\0�D�f������еH^\"X�a6β��Uƹ�����a[�/zx��%S�8}�Lի�z�����]ڴ2�=��x��Bd���s�\0�O���_��x��[:����z&?u�%y���r�V�*k�5}��N���������E�c����Y���s�q}o�@^}c�S�����Y!�y�o���5�_�4�������P\0������\0�ت�������A\n���Ao���.���� �k��m�(�e�\\l�òQa�[�F�nNʀL���^��\"[#6��<Kg��m~�af��.Ah�k�v~P|����\" (�#zf\r�V`�\r �\r`@r�����\r��UGnv'j\r � @w��ȤU@���\0�w��\n���Z\0@q��\r`��0�a�&}e�\"�l晬�aI�G�01 LD�L����c�����d�LC.+����B�NP ����p��Qb�\0�l�T�LPK��Ad��\0��4f��U��L�^�\\!�Q,����v�Q����P( �T�RƌP�P�q��\0苠�F�,���n�W�JO��P#���秎S�6��r��F;a.1�8P���@b�}iQ�Dx�RH�jE�\n����� (6�֭*�Ch�-L�3\"�v�t�dF6J��j��A�RB>\0"; break;
		case "lt": $compressed = "T4��FH�%���(�e8NǓY�@�W�̦á�@f�\r��Q4�k9�M�a���Ō��!�^-	Nd)!Ba����S9�lt:��F%!��b#M&Q��i3�M��9����\r�Sq�6ib��\0Q.Xb��'S!�;��Mf�0��i�1�B�@p6W��B�rs����J1ΑJ������J��#�H(�k�TjzR!��a��PMD4�e�k�C���e�֦����l��̦�o�K�`�t�&��e�錧-�^����pҟ �b���]�'�n��U�QC�i5M�{�B���s��/�T��#���#�\0��,����0k,9�X�b�c�\nC(�0��L; ����1J�#�ʍ����:�h�^�*謊&k�[D�(J2���2<���\$�\$IP�fA0\\4҈���1�z �㒈0���2��c�� #L�%oJ�5%H��M@&%R[l�2Ȱ�6+.�ʀ�iZ.��cD0�K1�#sL(��\0�����5�LF9B�+S��<aDR\$aB��F�m�#Ø�4;���P��b��P�\\�#�K�����J���#T�	#h�7@P��\\l���0+����]��+q��,�3A�b�h�`U��UR�-�H�懬ɲ�(���)�ލ+l�@!S�����+M����l�\\_�b_U�\rC:�\$�T8���k�3�C(@7)(c��2��Т.B<�M�P��]��H)��nO(��J���Vqj\r!pAl��2��0���o\$�e��Ä	�ϹC�<�)3,��\0�;��@�<L�2lA�`4L�0z\r��8Ax^;�p�2\r�Ӷ*�8^�tc��7%#x��T��3�x�LӣXD\\,C�|��x�1��:\r^-�\$�@�ûiZ������1CN��,\r���/�%��2*6�\"��(0�I.ű�\0P�) ��)��%:Z��uS�T�!�2��6�hKٸ&͈�Rjً�:\$�A�\"5b��xS\n����@��Ⱦ`�+�Z`Yp�7���\r���!��Y;<2ƹ�/x\$��o��N�Db{��i\$�A�@G�[:/��#G��L\"�\\��`�sa�;���6��l��`|�,�S֣}+iԲ�(&P3A����捗��mK����L���\r፪��t�	�!�,��:o�(Bfe����v�haO'����+P��V�~ѩ/5�����|,��&��c��_(�jY\"�Z̻4�,�����3!9�0�I\$	%<�\":�_)��e�ZS��p�V�)�)��b\"� {\\��\r����>'1] D���p�q.5�ѤP�L� 	!�1�c�;	)ᴯ��\"��/�>QŚ�I� d5l��U	â�����^_���-'�푢8G�I�*x�I�]��iEEt&L7�<�\$k47EuR/A�j��\\�(�%���)�Cj�w��T�M�\n�\r1Y�P���uk]/`�،Le_�	V=eQs�5ҹfء7�I�S\\WdT���o�A\\D��Ս���,�:��3��������9��R�&��I�:؝@Ҕ���J�V�*i�+��A)���w�mݲ2\0&��JK���~�2�;�� .����#��k�����\\��6^�a�'0Ъ;�jÝ�I׺�{��.�����������ܾ&:�_����\"�b�v�0pHl480����aZ�@jt)L\$<�g[-��a\n �:�Dt�8�v޾�佴�㹌y���x�(�>TI�*�%�Z�rE�	Ć�k��'rj@+'\\��x��AʲJO'�gp�T��#���:\r�ث����^8u���Bl���e�E=X+\"�bs�pƊX����*�����=��U���I+/*q_o�J�����VWW�O��5��I��6}|j{�f%\"Nn���\0@j��/a��i:>K5ӆf0�}�c'���3���7GWU����ٵ��B~��t)�:���B�Q��cP	�Wl�}W�^9M;V��ZZjR�l�d>�ݚ�0o߼�����o/ǽ���S������˪�Y���M.ߖ;��-Ck������G,5 dx����6.Em�����~�q���.��3�mS3bf�*���i���Z@Ay޸�~I��J8D���^'�k\rc8J(�bp�2s���M�t�ӈ�\"\$w80�\rf��4�m�6M�ei��A�R��j�WƆ�C7���GH��P���(r\r�ija/1�)��([��^f�N+�9��Խeò���[�)�O�P���߆�~�������{>��s\riV���\\G�%}>�m��C�׊�nɾ�?���j��O�tbY���5��?��RX}a�	z�%��iU�[@|s�!�����?��h��>����J;CP�ʎ�Cp6�jp�bH�b�X#p���R�m���l�j~��h0(dcG	�殬aϾ��H����nJ�0e�\$�H��E�<�����;j�	�h+�d�C��#�����	�F&Er���X�<+GN�h*�\r(�D� ���*��a�A#�C\"�I���N(*  p��Kq\r�T��b�Kk�\r���jBAP���LuD�I��Nr�1	\r�4��t�0�?�3k�G����\$��t-@d\r�Vf�lPuH�Ƞ�gJ\"d�j��z�'��D�m�\n���Z���a�I����j)�q��#*kq<�q�#���0yØ6\\KD�bM�CJ\n@�)�V!¬+�Fs��V���4*8.�b�I-d���V�&%��8j^J�Ph���� Ȕd��A�D�~��H�j��(�@�Ǿ\"�#�*�Ʉ��┪|3Ƃ��B*p��3�S#\\��D\n�0,b^�{\"�\0�<�\nDD\$�T��b/�B:��M�n��C�V������B�C��j�e���m#�^{�P�K�4��+f�\"�f	�s��?�R M.�Âl�\n�G\$	��rO�(���\nx��~-�~?�j�*!�(h6�NLJ�g��Db�@"; break;
		case "nl": $compressed = "W2�N�������)�~\n��fa�O7M�s)��j5�FS���n2�X!��o0���p(�a<M�Sl��e�2�t�I&���#y��+Nb)̅5!Q��q�;�9��g�F�9��6��,�Fl�MSR���q���GSI��e�a\$#�O�7�#�1��D9׎c��αZ�Q����d�a�8Xm(�23[�,5\\6e*<�\$�y5�f\n\"P�[�|�\n*B䠢��i�#�	�X�;�p�3y�k2����.��v0�䇟)��\n)�N��VXr9�����4���98�8�1=/�7%�;&�#�R(�\r��68뛨7*oR�1�m0��)�*J����9B��;�����Q���)<f9ƠP����ҕ�⬆������L0J��C�V���݉l�#�tA-\n�r�ߋI���俾TB߈#2^�%`��I�C���#:V2�w./	T�\"�N�\n\"`@7�\$����L�����E��C����z)��p�����7�\"6�����(p<D��)��~\$����\$�b(�aI[�#�l��\nX�#�P�Z���R�\0P�-\r��X�(#\"�b��#'�8\\\n�h�H23-I�<��セh�魙g&n�IM��\"j�ǌ�@� X*8��K��!(��*�V�*Lj9���}�w�� �+�Y�/W\";s#��:c+�&���z�P���_w��8����E\0��t�㾬&#j܆��P��{.�+^PÒ8:i��ġ\r�XDX	sܙ���^0����\rzR:\r�x*(�X-�p蚮x+,�+�>%�Ձ\0�\$\n'(�4O�7�P��9�p�8p�{�C*F�0�}���(�:��x�*��L��j����׌��-�o��K�4�>N7��Wr3��b�kb3�j���#zE(��\\�%58�s�th@����S�§:Vʊ�M�%���zz��j&��9���I��A%M5*��L�\$[\n�+�ވւ�y�l�\0��S<�T+:W�]�i&^dY念2L��;�\r͹�&��\$�34bٝE�5���F̉Bb�����Ô�\n�n+��¦r���Y�j�������	x|ň���@B�D!P\"�P@(L���\"wO�a=�A�Ȧ\"�I�\n�����f��ON!Wq<;ŭ\n����))����N󎕈�ș3n��?A�<6��.XDX�K��֬�%�� ���(��\$����!?.1\rP�TF�Tl�P+#~Z5�\"t���'2#\n5�7�^[�2�Y|,Đ�'\0rVB�^���EgaЋ c�b���p��pI�Z�u!���̕(�7�F� �A`'�JB�2kp�<�J7J�*6Ե*�g/L�[�r�H)#��)� eBƄ�Fi�s���2�)�:�4��RS�Ej�U��f\\�d�h��%��%d�_}l(���Ŷ(�an8'BDG߻�R����'�+�q�������\0b���ւRUk<��5�:�W�yR�I�|T�LVa%\"2(�q��5���P�wP��m{��0��O�B}\$�2���C�kE���Z�hd%س@�ঐ���l��T�\n5�7�j�z[*\$���߼����:8�����-��QV�_�ML��ȿ��x�`�\$@T�kp�ұV*X�\"���%!���\"��?vBVV�3L��N���Mpn�,�'��>��R���S���hz���6��n�����u\rc�Y��E�Q4F��5����(+E��UT�r*�}?R=+7�7�B+\$������\0Nd�٢��ZYK�-\"(��7�*�<m��A�}�����4�M8�Wϥbk�ӈ��k�RŇ��cLy�(6cn��9,Ua�7R���d-�8�c���D*6�%wW���\$t��[�����Dh��p&��./(��I�wI�eA�2�\rII��Fn-%�&.ݜ�8P���侻��o���� i1��K��7mT\n���֬&Y2�Ha�^�S��DXh�.�Y�̴��,}���LB��pq��tr�KiuAp9�ɹ.G�S�a�\$��g�5Y���\$5I��A/�<��軟��\nX6]-�S��>�ԐN�]C�3u���>�܉r�ƪR�F�Q�+9�['w`Ʒ׷Ω߿�L��Ge��;{���h��wr3��:<;ꇟ~塣�!���S}��L�Eμ2q��i���;��ViV��]��4����bJ�*D�A��D��\\&�.<%H'J:�m���q!���PC\\A���<Hu�d�r��m�dB�Q,�'j4`Ң	�%(�\\*�@�A��|+�\n�Z{`7�b�,��aJ��߇.�o�YK�#4(\">\$-��\"*#�<���O%x�D����\"<n @P*nE'��%�����Б��?@SjO��~3bbӣ�z���̌L�E�4�/-��,�L�(��%�H䠈Zp�`�V�bR����	�l���lm�@��Č�p'@�!P�.����^\"�����(�A-�B�@�l����\0��*O��\n��Wl�P�\r���˴b�`#��>��q	X	�Z�,�b\n�*i���(H<'�\n� �+���N�7l���̻LDCbT8�	\0�@�	�t\n`�"; break;
		case "pl": $compressed = "C=D�)��eb��)��e7�BQp�� 9���s�����\r&����yb������ob�\$Gs(�M0��g�i��n0�!�Sa�`�b!�29)�V%9���	�Y 4���I���2��FSЀ�m4ǁD(�X�a��&�\0Q)�����G�<�zF��� :�O4���n2��v\\�\ne����B�U��W�\n�ҷ5'��t���(�u6�&3�@D0��\r�2T2Ω�KY��r����Q�oܝV�Q3Jy��Cф�&0�AE<���\n*����H�JM��Mȏ7c@-'�x�:��һ�c�0�����T(\r�b?:�c�ꎄz�4�kC4����#�-EF)	�\n\$'>����Ƚ��\0��#_\"c#�5�HK'O0�<�R��a�c�8C#\nbè�5�h  ����4�\"��<�P��!�0ء�B��H���2��(����@�ߥ#�\$���;�:�H\0�7\r�;�+��Π��K �!l���S#�<��<�-�h@)�\"`7������O(ର�=13@aEc���8/�s]��p�hQb�����*�/������X�>o��.K�H�0TX��^]86@�`�i�k�X��-[+�d\r�\r�lK���6`/��6;M�q�(p����5�\0�)�B0]Y�r��(C�攌,`� ����0��R��׼�#�\\�6��~���>�1�0@7�YyG(#�*4�A\0�\$\n	��9�J;O�CX�@�<����b�.1�c�.�_�T��)�p�H[�9���2��~2d��4G�0z\r��8Ax^;�p�2-��H#8^�t��7ACx��Q��3���&/�Y���p�A�#p��|Ύa�4<q*V��\r%��I�!�&�br2��3�F)wϲ7�7���1�X�ؠ�%�f�У���\\۴a�*U0�	p,�@\n\n�)*�؂4��a�w@����`��y�䝨 ��A\"7��Ç�\\�\0Z!�ܝS<`U30S%�����h�\\\r��\n��%9H�uC�b,ЬL��̊�� H��4�r:��T`P�,��J��w�ς�_C:�V��*(0@�`F\n���\$�һ��ҍ�6��0��6	Āޓ��`��a잕��CAf�	�A�晛ai%���S���_��T�'��4��U؊Hz�N%����[�3�A�?�^�PA��0�NC|�#!=�������r]�%��B����G*�Itlz��ѐm�r�6J���!��׸��&�,6W�a^M���!f�^\nꔀ���I\"yia\$j��?B\n��.���Ҫ�z7.��0����JP���yH�('���éN\$74~�W�8��n�!ð�I�a	g`��x�%���&x���;�\0ήк�15Q%�S7jفE��+���\\M�C����\0�hI;���Wtx(��B�s���Q+�ߩJ��Sy>����7��RO;�l���䪉I\$I�\$/D�xK#6����-��7D	�d̚R�?�|�}`�R�6&�ڄ\"R�Zʾ5�J%9�Q�Y��,\\dr\$�@��2ԊG��C����yc\"!�Ξ0�;�����|�h��p�wb��)�:���]yPu�\$��]�}v�}��&�]	�Ń>����:{o@y�Wʹ]FxP�D��	`�)p��i��g\0007k�P/\nN�	�B3�9u]�L#Dr~�,c@Zj�c��C�\\j!� \$����\rB�0���6��)+�/�%�\0����6�P�����u�\n��e�͍ԠH4��)�x�N�IIvD²�`C�ВDJ�.GАy&�J���J[B!��4�����ˆ���>h��	��H�h�V�KV\$8݆��A�:&(���\n�~�k	+����5\"iFh;YS�P4�aV��r�Pt��E����v37��Sd_�M����M��r�q�@&��Q/�T�-��*va�a\n�R���`w�/�J�|�b5N�=������fhJ���`՚N	\\T�j�eNu��8)6�^ްx��v�~�[>Aq������\$k���\"�7 ۴��Z�������p��(V��X�m-u����J�zu�i�v��c�s�X�wdy��Z���ޕ�H�{u��ٹ]�3����9[j��ٝh�v|ϰ��HZv�����e����~�x�<��ŕ�?n���ΐ�VƐ.d �OQ�v�/���5�:B�׺�F��+�Q��PY����,�uHЁ�%i\\�6t�C�hn4�h锪�\\r��(��BQ��ZՒA=/(��?�i�+w����\0W���h���\r�̰VC�}/X�Me�<��vr�����3�!-�\n��O\0�.�����'�E��F\$�Fp}Ed��V٩25����#&���� ��5\0�l�Ԫ��p>,0�f[�ɣx`%\$�'\\!��H�\\e�n*28�Xc�\\o��j3B���R�N�.��n��/���I	��尖���-���F�J��^�F����TA�V_�\\L���Y��Df�@J5c�9\"h��s	�(�ƽO���M���\rp�M/�۰���j�p�_��Q�CR�A��\nJ�и�bm�y\r��UK(,�:��>i+&����!k��;o4�0Mk+\r\"ʲQX��*<�m����^�l��F�c�>Q�*�A�!��m��-|@J �8ǘom�\nCj\n�>��֪h�\\��;��=���b�C���Բ���d�����1� J�-<*�� 07��.\r+\"é��������K�Y�4��켰8��K�lc�\r�V\rb�#�\"��l�� E\n�d�9fb�l�ҍ�b[����@\n���Z\rF���9��&�@HN�(�^��INv�Ҥ�☢j�R8]�v2r�*�YI\$\0�?��#�\0�#���\$@ԅ\0�(MQ�<�6�\rr���\$��R#UR����;K�V���4���%�\" \$&(F؟#Δ:����� ���\r�.02�B\r�Rbb��Q4��4� E�'Z�`��. EO5I\r��sd��-s_8R��@�J�Ѳ�83L8p��b�&\\Nch�,M4,���M�\n`���,#Ļ�p�<��=/�'I^\n�|�T\rE�,#��b�,)�\"�\$D�H�[9�@#�nf6N6njY5s[\"�a\"�C�2΀Ia%�B'�!0hW�12,#�z�4��	����AB�%�"; break;
		case "pt": $compressed = "E9�j��g:����P�\\33AAD��� a�Dy���V������v4�NB���u4����QP�m0��sl�i6�̒Ӕ�c���2ЃE�L��\\�?��f�c	��o�F�9��a6D�Z���m&)��4�&J��U9ʁE��a�Jΰa�p 2]���t}je9Ү�}�j��\r5��P�̙�k1�����gX��]L���(�a�ID���C0���k_���Q�o�,|bf��&�Θ]P��v2�=9����P�W��C�{�\\o>3��#�P�7;L��+�[�48�x�2�j�Ε�;�lô:��K��`ƕ	B����(�CȘީ:K,\\���!0Q\0�0A(�C���R\$��?)!	0B0��.ވ+�*��1�Ϛ^�%��@6\r��'�NS�c�01��pL�'	҄������Kj�)\r�\"�1A�,F78��r׊b��(1s����-E�3��2LHlʿn�T:��2U�5#���u3z(,i@،���6������6-���#K�'Fu���CF��@S1ZS�l�@#c����ZLb��#0쁍�rf@iDH����:��R���-��Y�uj�.��2)��2�K�5A��x�L�2� ����&�~<�-����!b6°�JKNH(�Z�pbER\rњf�9C��4.Iw^2h&��rV8.Ø�Hj�M9�p@V�D�3��:��t���93��݅���ۅ�p�^.)P�2���F'#XDXc����^0���@�r�ǌ75�:6��:���H44*�)��􀜓\ruk�2{�>̊@��YYC2)aJJ��+��\rɊF�\n9�	�<��B���,Gb#���=�fy.���(��N�J��\nx�*T�T�n�0@3��sU�:C �=V���>�i`���=.�g7�b��Hct���V�E�\n!�����yɀ	�*3=+�`��Ԛ�z˘b�O�l9�]\\�V�(W�\r�luR!RJ�[S�d)9�TH����U�������!��=���@�6���s@!Y2Dh�'(`(+�>�\nX:q�\0��RjU��ȗػ2���xg}�(�ƨ�P�h\r/���0޿`y5.e�ޝ\"�H�@s[��X�oY۞*Ŵ���w��4f� �b�@�YvP)D�\$�xNT(@�,��A\"���.��T��V%3��&�\n�a�#�B���,	𜓹`*]	!�8���E�\n;\r�@��Z�\rQ����3�9�,�����S�,�H@\"_��f.k4<	���d4l�x�I]�\r�1��ZLU\r\0��\n0�\r�l,���!��>�K?E�p�DT&���_!�TS�goa�,R��\\i�;0s���T�Y�Z���r@dT:�8�^&��P&���� <t�>��\"Tլ\n2��ԇ'ѺH��P \rZ�qGI�����\\��g!��*`\\k���%���T�k��cv���:�t�ROȋ�Ëc+�*&�&�X��\$�!W����Vk\0�=�t���S^�㬁V���h�Kǀ@���V\\�z�%�E蚣��ze��\"I:��Ҥ7s@�W�%��x�R��b3����zIXw���T�VJ���A �1fX�2x���9��ZQ�u��\0�Xc�]���)\0��L��Z�2��y[�6XϜ�ŀErc�ٙra�8�\\CA�o*1� u:��EֳO7343�T�`��\$�kγ���3�2=2mD#�@���'�\\\$�.���Ĕè����\n��B�xϜ�X��#4�՚���I��a�\0�\"b�hNF��Q�JPr��4�IRQ�Ze\\����?���L��!l=RG�<:Ґ��&rn�Λ�OG.j��*�9|��\$+U����J+�v𮰒��T�Fw(�ą�u��Z�#c�\n�v\n؍�b�U����Oa%\0,���X�9\"Ϭ��a�r����y��^ۍ�sk|���ᙘ��Ԟ��H�q¹�����\"AS1�7A̠��ʍS7*�{\$Y�\rFYyڀ{�EoH{I���ڶ���vI����'������V�9yU~�~L�@U�s֗\"M�q��U���s�O�4����R���m[��t�����4��O���d�:�`ՋҮ(9�H\"*�(��/5��`�*���AV�Ze�����z���`�w����B�JIQCuy�U���8��3%9��_��vh��HW3Ҥ[��!R^0�T�%=2�?�y��>��z�G�wN�����#���7��&��ym/��������	���g#�֠�o���8,�Ｂ=s���f�~��T.iO��	\n������}���gf�/�a��]c>��ᄂ�����Fn:p��>d��*@�&��\n��#ǣ\0�3`�M&��J<b�-,�H\$�OI:�k*�06tm�ً,8�\r�Ve�L�J�����Fb\"�00�<�,���&���G1g0.�4�`��Z^�B�\r�δm��\"�v���\r�7�U\nPJ�B0#CPn�D\$�A�j%ej僌��:IK��\n�|��4^ �\ro�D�n��7kD0b,��at\\B�,\0��0����B�f,\\8��؃^�Pp��D^��lф7�\"�31*�Ê.	`�6��3,H.�΁FL:cJ�e�3/��1N.qR8m���\r��g����Qf8N��@�1eB��-���	���ox&�СZ���i��\"�����8KΡ�	�c���U,��V�\"V��\nTC�ӄ,�\"\0�I�t%\$�og�8��8bā�  �! "; break;
		case "ro": $compressed = "Ed&N����e1�Nc�P�\\33`�q�@a6�N�H؁��7؈3��� 3`&�)��l��bRӴ�\\\n#J�2�t��a<c&!� ��2|܃��er��,e��Β9���l�F�9��a�0�����z��&FC	�eV�M�A��b2��q`(�B��8#9�q_7��I�%��fNF���a������%���59��j��!U�ܨi8f��,��i�g�qC�rH\n\"]d��s`d&\r0}t�Lr0���pV��m�hE#+!6e0���Sy��t����qOfe���sIo�귣K~�@P��+�H���+���	+�䑰�x��&C�Z���*�\n?l��P���6���:�L��&�� Ҕ�D@���(�/��aF����)x�4���\r�x�\n������(�\r���R�F�\r/��J�)�/C�2�#:��F��\nƽ.O���ː�%�;��0��/K+ܓ���86����/Lp������Pc��\n\"`@8��h�PC�4ϣ�К�\\�1��@��V�mA���!�����U��Af���v��������`�2�#h�?#�8Hw:�3T��&h�-˅{�V%�z��j\r��!�b�����\\<9̈�1@Ap@�>\nһ%~�L�V�h��t*n��K��>(�J�C����+݉�n뜗�y.f�6#��鮡do\"R(6B�(�ݳrn���x��N�\"C\n,8Acb��ʝ����0����c��-��2a��N4 �0z\r��8Ax^;��r��C��\\��|=�RP�\$7��xE!�Lh齋��D5�A��80Or��|�a�:\r�	�86�CL�Ei���rIc����4�����6_��%�;9/�HP��=�֧�\n2�#�L��v�g�4J�\"�.�0�l�R�0�-M�B�#Vp(	☨��9\$�����X�Q�2�Ђ�ȇMrk\$Y�8h��5����΋� ei���jjx\n)8b�]!�Kd��p@�)(d���p��\r�m��GnJ��&aȚ����Q�.PH�bЬ\n�O-��j�&��J�  'l9�SLj�A�E_��H��z�HQJ	.�(|���,�2������y���	\0KY��u���BҮ�^�'\n\" ���K1�.��0��,Z��I|�v7����S#�O!Q\" tNٍ?K@�5���4������G��|d�!�P�n��HtAƽ*K:�0�\r���|�Y%�4�D<qN����}�V���Y�u��J�e�iB1�K�y��-�Mh��i A�Y,!��BЅ%;�G��@���F�\0�+��^H�M��D��D��1Ǒ���*�j�2\n�\n!䔖�XT��S4˓\\�\r�`��MC��6Y��L��X�<ܞu�T��CH=8&.���֔^��9,P�69�c�ҋZ�t2�I�s2mM�d6Ee~I�3�F:���ܲ��j��\"Ĕ10b�UD5-��O*`��%��UHr3%)�V��l5��N��+��W\0M�UVQ��b�b�����gz^e�t�-\0�*]I�a�VJ�'���R��!�̋mi`�/!�>t�u��R'd�#\\�FIP�Q'V\"?@e&IkK��'����͍~;��ϣ`�@�	 &2��c�i8�wP���ba�J6U�߸�J�by��3̹*V��E���l���}Q�|�Ƒ�^+Xf/F��Rk�8Z4a����|}Ķ��t#�%,*����x�A�3'1����௙B�ȅ��25g�B�OYG2�̓ѵebwd�e%�s	��k�\nR2c�b�g�1M��\nsJE&�6��Mo���x����]�R�0'\"o�j����L�\rrJ���L��Bm\r\"�,�dɕΨ4��u�}\$X3>�W5�y�7�R�_;e;H���)@ܣ�@)f��JE���lù�,�ג�|nz]}���lP��g�=��3����g@\$%���X�GaM�=w��:�0�9y�w&���P ����|���!j�Y�������ټ��(	�;��o���c�e��\n��\nXȾ���gTZ��1�I�-��2LNAQy��V��.BKyOϧ�?Ҵ:�[S)ed����g#O�M26\0eh\\�4\\�Vj�7�䖖a�(��/TЬ_y����-��gnry���^Y���~֪-��R�zL�	?�r󺣤yvw^��x������̈�wn�w+��E�=�)�ɿ��H����k��R~0�D���=WA��Х�A��N��nTXS�Q&7~�By�5�	�`�Y��;�����<Y��H�zB�����;�s=��}j2��;q\r���~�\$������o�����ɗu��\nB�L��!�o��-��o�C��\0/��ȳ\0���7\0�N:�/�F�p \$p���06p:6�V�o���Rۤlт�I����V7<h�q�ʀ�ț�:ÐP6ʜ����[�s�^��W��B�	�l[����x@�7Ƭ8Pv/�.�0�j�5�(�,���PL�M�&��m���.\0B��CfhD\";f�d#ςR�)6L/�dN�H���Q�(ʘ��C��I(-N;��\r�L�P*F�0���0qP�&Q:�.����\r�Vc~`־���d:�4BB,\$��BL5Hv\r��#\0��@\n���ZF\$)���rK`�|(�[�����@��G��'�#4#�����..�3\rL���ș�(L�fb�BR���HK�\"6,Fpec<*��P8bn@��,�%�? ��B��*(�8:�|=#</��!B�H�ҝ�\rN&��=#�F�|f�H��c�vy%.3��%�P�@ǂj-��`�w!c���l��d9��ʬ8`���8-��e),�z��%�TB*H�իl?F��`@7�\0�����,��+�'�v_iNBB��*H4\n\$!6B��J�l���E%�h�X�F~_o�?p5���NB0���[�pc�/`	\0�@�	�t\n`�"; break;
		case "ru": $compressed = "�I4Qb�\r��h-Z(KA{���ᙘ@s4��\$h�X4m�E�FyAg�����\nQBKW2)R�A@�apz\0]NKWRi�Ay-]�!�&��	���p�D6}E�j��e>��N�S�h�Js!Q�\n*T�]\$��gr5��9&��Q4):\n1� �K�I�Iзh���IJ�6H�B?!���([�&	����sD5AW�ꋬ�QcCXMe��1v��6Pe��:��C�ռƚi7\n����.,V���Ի����:��,�[�ӵ���7��ˑ��>��2S�jbF_#\$�@�/��T�:�q�G�%t�9�g��BhC�k\n��>P�����&��4'\0��B�@*,\\CC��±΢,��G�O�D�%���Hqi?Jh,�ϹKF�.�+\r�\0�(��P�H:�����ڬ-���I�\\+)N\n&��i��@ ��ʯ@1\$�����Z�?��?)�iAA�U\0���4�?zT�\$-�\"ݠ\n�����}@P!���\0ɴ�H���t��!-cIVmEk[�kӌ�͔��W�\"b�)d2�.	uY��Ri%.̉��L�\\E)TT��K>Kj�1I��۬/òh���6���|0չK��k�ń0��ѵ#�`���6���0��P�(���Z�B�22���\\�E�\0R������b	�͓��²��R�C��fWRά'5R���MgHj�E����͓�C���9-i�R�0�)�`AC	�`�P�\\�%����>�	ӥ��YKW�����r��5\$��6�m��:H�6�#�_o�,�b��#m���^��T��c=��7A�HQh�+�� (+�D��Fj������^ ��^�\$��\\f.��M�Bʉ���usZ��œ?x�xD�]��b��S>�0�rˡ��6xA�\\�`\\R�Z�N�q2�r%1#����v��07)4��p�C�t��øoJ�2���C�e�T@ �f��4@��/����hi\r�,A ��(n����C|:L 0� �C�#�-��D�Hm06Ð�xaŸ9��@oV!�7����hi�6��!�j#t�QV(�.�ߡ�\$�����vIQ�2��h��IΪ�g����rQ��;K��3@@\nx).H=��C�1���4���})sh3����8��lyB��\0�����OH�+Da-���6���\\wSh��fS���Let�b�m�SB@'�0�NI�i�a')�3&J�rsL��c�6&��J��_@LHA��� Λ�KQQ6-\\��rv�z{Z%4����N�\rUrL�L�Cxu<7\0��|/x1������\0�`�F\n�B���bb��q�`��i�a�����1�L��N<�/K�Qe�-�N3I`uپ���V��n�ձ��ʑ�k�=G����aX�\"S̍��2���AX\r<��y`e�\rePĔG��\$�+�SE�E6�@P�NDGY`v�T\\M�������-�-�dO+�ԠU9\r�SB�5�HTB�A�d����DY��b�\$�\$��#�!�f���R���hq��7\$`��\nX'εR�ג�b4P��^&s�k�����ͧ�7�;�U�QIpO�d�J��Ee0�i�o�2]�V<��M@MŴ)��{��Z�ʬ��ef��E)��w��_��t��Qc@K��\$���x&%>i!��M��Eا�ty���i.!�,6���xz�㐉�L+&8P���-���5l���h�J%Y�8\n�d���1\\����2�|�W�'�#A�������_�F1��IP��[����:�bO�M�2�t�=՚�]�{i���,�	^����J+����t�,-�1�@FEna��m64i`*t�,6�9�MHȥd�U�j�]�I�c�Ԝ,u���/��5�U��2l���\$��\\M�K�U\\Z�s��{����@���MF{�/��3�T��\$�Z�貺�����M|��n�.y�����/���G��w���v�1ʝd\r[p*�����,g���~�8(���@K	\r�v�1!���RU3���� �D𷤋(��|m��a�\n��D8���WZ�����4��/ڊ��ά��BIз�Dj��l�~u�q�(=7@���KIz| ĳH��O7�LG|_���LIf�\$���_��A�e���,�rK־���n����3hZ��I�p�����k���P��yX�~�oY�m�ט��t>���I�s;����tZ�����eT8B��Umh�Ǩ��۾I>�#�A@x��m��K�q/�J{�,%�xK�+j�ַ�^����Q\0n���9�^�\"<]��x8@��@h\r?��0ɖ�5�۰L���������\$g,����lN�����������\$\"M.�X�jW�i�-e��bB���m�o�����f�l�R�L�b~��ΜO��0fg\$�m��R��\"X�ibm�Zm�rDP����m�1�3��х.����L�G��D���Db`ͮT�l�~�8�c���;	L�L��Ô��P9%�S�꿂2�F��*��P<���\n�JP��Ņ�~Ε\"A��nj���\0��d�����	{��\r�e��VF^�&���*�Pc��Ko<��62F���oPUEB,0~�P��*���mr�A`{��S�Ы�;|���!#�����l�Ѡ�1�Zǳ����m��]Q!m�L�����D?�@�q��n��N~QM[F��\"�u룵 �� ����2����O �!2fB�\r�/�\"�|\n*^�����\"�m-m�Si��!d,c���������Y;\$�F<g&�F�%�����&�m�5%F�\\�pxRPuC���ng�I\"��R7\"-\r	�r&#�'��<�70J˰��-�p\$��FY,�����2&@p��.���/\rr�L�\n���,��SP��0��1��n����Ll�2p��+\r��D%Η�0S@ؓ2r�n<��4Q���M�l�E �BKp���g3u5L6#i\\���J\n(A#,V\$#���V�Χ.��μd�dcF�/fɦ��u�&+y\$���A����<�3��1.�l�4.L�N��m|Y\$�3�7[1�&{3nR	?���g7��\n�D�7�@�\$)*,P�A�m,@ES\r�8F�ܡC�<�4i��5C�F(%\$�\\δL�d�EB�F��F�G+�tmQES[�\\̓���h��=G�?b�D��E!wE�t�:toD��~It%T�P�E�rsa2��&97�?�?t�KQOC���\r(!r=4����mO��I1�r�\0)��#��NS\0��\$.���R�jA��5&A7�j���sJ���3���ST��I�50c�T�T�=2��.AK j\"\\�Ш�%>LU�������6��o�:��1�Ӿ=�`�m�:�2/A@��-�Y��Z\r�t�][��Ӆ1\$2����T�B��������U�Ԛ��汧[	�P��,�b�D/�e`��π�b�g\0\r�V���B�J��,��>g{��W�t5�`��(����\r�� @Hң��\n���prhĆ@�NF�j��W��-��U�I��\\oq�V6�vf�&Sif�^!^��v�U*��+�*#��'�)�:��E(ѓ\0ְU�SJ�A��@,��#��V:@�^��9��N*HLH0D�mm9�gK�A\"�{G�*�P��J�!��B\0�� �g�sjD\r�\$a��a&�=\r\"A�u,�P����%1Լ�'ʴʖ��@{1��ly�qKpL鞮or4�u��weǁMUx\0���ʋ����fHr\0�\0�\0�H5�sy��w�3����Z�t}#xD���D\$�XA]��贗�PԒ\rD�d^!����[�ДW\"���Y�Z��eh��I�J1�x^�&z+XOrGs��ը�����L�S�RnP��^����X��r�Odɐ�x��7t�KԆ��J�xKt�	�r�nE+��0�8��\0�t���E�B"; break;
		case "sk": $compressed = "N0��FP�%���(��]��(a�@n2�\r�C	��l7��&�����������P�\r�h���l2������5��rxdB\$r:�\rFQ\0��B���18���-9���I��0=#\0����i�LALU��b�&#���y��D�	��k�&),�P9P�j�l�e9)��\$� ���f��k���4j�\\�Y��e%V*�v0��3[\rR :N�S�9� �\$µ��1�iH�'��̠��`r����b9��m2�#�2�\nfm��5���������_��/�D�/��6+���H�6&�Ңn�96Cn�@�AB9�,��8	1J�3�7������:�c� �B��7D�44'�|cƫ���P��'h�@֍n���P��,���\0Ă�L�+K̵*��P��Cc�:�è�5�pЂ3�C(ΘM�P��|�5���ޟ����3�\$NJ�8,bb\\4��!�]I�\$<Lc� ͋p4��cp��`�0��p�&F��[\$�K �#�0�#��<e���|�H\"�A����,f�ض9R6�\"������P��P��&�18bHڍ2 P�<\\���2@�MeV���\"U~�H6���C��g�c�8V��0��HH˄:'E�p7�i�@!�b��X�����3\"v�,�W�`��wl/����1�:B;F�*�5����\r�uZ2�i�ohAH��<���n�����g���.YV°K\$�լSd����Sc�k;��M�b �+�S��\"���9�蜪��L�2c�,��0z\r��8Ax^;�r�6��\\���zs�S	Π�U�3�<8�18SXD\\C�q���^0��@��B7���\"R� 6�	�蔭�r�1#�R��1��'3�R�2QC��\ro��l��rlXm�� ^y[�a\0P�)H����[�i�w�����Y���ԛ����`-a�/QK[+�xƔ�Rb[E\$���SnxS\n��@�f�X�\$EDY���B�tEE1� �V��=Ř:�W��~3�V�#BJB��\n��=�@[�F,��)��A�)�\"�*���.]/�ccP�r�\$9��B���_ka��~� c������(V�MCh�^�%���Z�C예\"	�	�d����3��!�h��䦂��E�Ѓ�lt��P	y澧��Jq�#̩0آPe4�	ቓ(u�bV��Uh*2�P\r����e���#	u͝�/�^Io|�2rRèd�e05�� �\0S�1�a�0��\0U\n �@����D�0\"�d�X��L8*y��(v\$������n���(	)?�掦êc\$�'```z�#s�CU�n@PK;��� �G\n ��U�K#����DwIƛ:p���\r��HAJ|��:���\$��C\n���<�w3P�h��X2����'��^TtL�c�!���S\\.�U#���#yY��u�ü7��d��t��e�DԈV��8)�Bq��o:H�]Wd�G	Y\r'H���O������\0�`ȳ4{�=4�7�_y�(��)�PT�U����t���䶁իǦ����MJ��lp\\mҰ����\\m7JLz\r7���n��d�=>���]o��5��d�����S`,��<��6�j�V\0�������/��TX\$�j���~q�_����}/\0'�<L����!2J�)SF\0�-٘�C���]ꔸ��)M�(�T)�;0F(���2�R�80uX�Ɠ�qS����h�|��\na�:٤��٧E��񡳕��:O\$�I�dRxJ	�W	%+{R^!-0^��\\�p��Zj��D�皘�)��ԫ��(IHVW\n\$��ДJb�kt�:@��Ҿ.!�ӯbpj�Y�\n���F!�kb(�Ј%(V2NԑD�k:eM	�Ge�&Թ��#����fhrS���F��r@�1�N�1�'cY嘇���H!:�3M�]���f���\"�`�#A�Ү�Ca�۔!���P�����x�M��z��\n���\n�Ѡb�8Uݻ(�I4>�e�@��Ï�4��I�6?Fo��q�?���ڙ��G~A������k��\\�W���!�e�\r�3֦��Jӟ�PE��F)G7cd�-�\$�H��\\\n(n+��7&�_9)yM�E��t�RL:�{�m����)��b��������ow2�0#��,98'm���F�{�d�����V��\\�~V����7C\"o�U���!�\"ʹ��A��ʲ��I�LͫW�����ɚU���9OO�?�h�����\nZ9#�E_Z�a�\r�!�~���LVuQ(�3����#kb���{k�ȱ+1�����RSZ�~*�#�⨸��a���xo4}���f���(B��/����\n�1>�/\"��\0�-����Lj(���\r\0Dk�20�f��bb\nRg�<� �\$�|D!z�%�D g��'O* jD6\"�.��nv�\r����ЍNCL���j��S�\"���DaB�\nD�M��)���+*�e�\$�2�Ol=��'�4��獉�K\r��N�����3��a	,��\$jC�'0�����H.\n���-�7O�O6�c���\rp��\n A�̮�!N6��# �����/3�\0�P�P��2G�Z>C|9�\r�̴#\\�cd�G�0XC�0|?1T�O�Eb�V�N���R�#3��|@c�`@E�p��J�,?���30r���`��l+��'�Kq֓\0�% �\$LI��:@�(#�\n�����W#>��B3�\\%�@Л��\r�V\rf:\rdhkk�H�9B�j�Z\"g�Xäkq4�@�#�h�f� ��Z�3B6-\0��%D�K�+�+��(�\"�����)B@x�(���r����Í�_�#\r�#�>���`��{L�]��F���ق�2D�\$*L��\0#Q��/������\np�Mc�#C��&@�\r��(1D�+r�Z� ��3\n{+��#t����S4�\\��ܣ0�3M��m�,����R��p�0-��bp��'��*�|\r�����\0�ꘀ\rL�x0O�/�.Bx���N�С� �\"�T�(;;�����r��L`\nKh7��&m�Ϥ�[s�x�;=��3#Ľ�`0ŷ-0C3��,I|N3H�*�\$'*��,ܦ�t�W5���S��B�R\n�U8�#���	\0t	��@�\n`"; break;
		case "sl": $compressed = "S:D��ib#L&�H�%���(�6�����l7�WƓ��@d0�\r�Y�]0���XI�� ��\r&�y��'��̲��%9���J�nn��S鉆_0����Th�g4Ǎ�i1��b2�%�\0Q(�z����՜�\n(���h�@u�����g��̒|T�xvR)t�&�f�K�wS1��5�M'�A;M�U0�u�XD�T�i��V	�\n&�d[�9��m2�P��N�6��f���\n�p���]�g�h\r���9�7U�e��6��<�L�=9{�'ma\$��?(:%���5�)L=��1+���0�2�3��(��BnB,�C�'\r�&29��&c\"�*��rŌI�����l0��Ԓǡkı[�2� P�:��X������9�SQ��J�5�Òx�;�J��C�\rCz�	��H��x�>�b�֌��ܣIC��6D<2�hZ�A\0�(���ȃ�C���9��+!+0�-�N��*���N�.���&���//��1�¨�7�1eh���#��u�Bޤ��g@�J�T�T�cq\0.�c������D=�!�b���BP��RH����?7�>�0�[:%�s������2�����;�\0��ת0@��RH�8�x�5�2��O)��%�]���h���XJ���?MJ������?u`����9 m��;�LX�<4���&���3��:��t�㾔L9����ڠ���Ø�7��xE@�C;����W&�A�6��<:�x�2#��U���*\"H��j�^\r�D���*V���Q�J41�D	�ɸ�\$\n\0P�(킛�wߒ&)�j�3�CT��=*��r��bh-z�0�=��kX��!Q��9�(*r��|��_��)����Ol�m�=rAr�x@���*iⰈ�Z<�ꗋ#x�P�r����?ǃ�U1� F���`��HY�/�����^��Dͨ-L���%��� �x��vN�����zS��\0�#ƪ���\$p��aò#fp���HO�Y\$l�A�u?\r�8�n�\\۝)���n���t�1L'�2f��PZA�J'��Y�JQ?a�܅5N࠱i>�d�BM��%�P:� @�uK@(��H�y�:�䡳'��S*G�9�) ���*\r��B����L)0@(*3Z����	����Jv!��O,x�<E�!�>Uf!��@PK8���t�GM���2����Zaa�g�)�I�IcW\$�Ju���w�����+\r�����t��a���^�eg5�\rS�t�1�xj���éXj���1�	{��xp.7�t�g��H��Ÿt�Y�2J\\ĥ��\r�aa�����a&0p���S2'�\"�ƌ��r�* ǂJ��-B�ᖤ�4\rOP�5c�	z�u�x�d5e���fĊ9��ʼ�\0��Vj��(�\n���BǪ�[\"�m٫��dkJU�V`�Z���ڷW\0�k�]C��4sPj.����:�[�ŇCV&�!W(��}cqؿ���M�C�.V��X��\r����� �ʨ,�*�|��bI�yt��ۋ\nx����)A��mKE}�ֶ�0+{llq��WA�P	Q,+��՘��x\nk�`��)���ٚ}l 1L�s7�:	\$dRX�f�y�L�_l��)N��m9%B��w�SW�K�k�W�+D��%��Qq?#匼��Sz�\\�!o'��]\$YR�����zó��`(+_0�_�h?d\nZ�R�[v%O�� ���C\$�7M�M7O#�#Ģ@�%H,�:�\\��ce�K1�NȪ��?8�E�`P����`�p�f/�I�oZ�����-�!i+�cD����0A�v���Ε\$��O#��N�<�Y��^g\\�W�\"ΐ��h���bMN�=6eH)&��ǣ��\\\$a��=!3ʰ�^�=�hSׯ���a�C�%2��E�Λ*F����&w�\n�أ\r���!4���t�o\\cP��/p�W6��5�B���Y��R+z�=�+�����M��8�����g��a�m��VK����ķ���Z����^j{��G����s�n�T\n@r��uo3���M�a�5�#S��\$�§5�el��DS����y�`��̹U\$�1��)�2��v�*s��(l��T&�m��AC2H0�1���u�y�\n�=���9T�\n���M��\r8[���}��_�'��[3j�=��/��R��l!�J^��|�t7������K>M�DP�^��ԯ�a4�K&\r�8���g3�Hk~a�I�ZK�|��~���/I������Sp�Y<	0fI�8���[����������G!�:�0�>IC�\rd�7(_�w��fX}Cz�������M�ʄ:S��\0HV�C��o�+�J��)H�R������oX�� 'k�1I��ﬆ�;���N��G/�/����p@�-��j���6�N�60C;F���4;��/�ü����oT�,&'�\\R��[�L�\$�t�p��Uc��+|!N�#����y\0�P��.&�/Hn���6�8�0ֆ��lʳ�Ԇ�nD�^�Ƹ���\no�L�G0�6�ծN�lj^\0��X`�DbE*�M�R��Z\$��L�\r1�dNE1�C�\r�V�K�>�z�i\\}��b)�%���F�D� Cd\n���Z�\\\r��3Ef�Q*�Konb����\n���d��0\"���k�L���E�냬<��]���#��d\nN����0�0j��)xb��gܱB��D@�mJ���օ(�\$�OcX	����R\$F G,5�`P\r&��H�h�B(]�b{HJ��D�\$:o��%�U\$k�'�rpl�%rH�n1&�2n̄&q�q��\$��U`�&�F6D.�B�	\$�a��@�<<n�5`���\"��t'�}*'+G�+�����qG0��L-�H���,Cq@	�M��L�J���+R;L\rG��lJ��>2���0�#r\\ݪO.��b7��0�#�hi ҂b"; break;
		case "sr": $compressed = "�J4��4P-Ak	@��6�\r��h/`��P�\\33`���h���E����C��\\f�LJⰦ��e_���D�eh��RƂ���hQ�	��jQ����*�1a1�CV�9��%9��P	u6cc�U�P��/�A�k��\n�6_I&��N�~]�3%�&�h,k+\n�H��D�RIVow����>y�g�����	�4%�����U����B� �Z�5�Ŋ�W��i0I��A0��-y��#��損m֝G\\b��	'hi��E��Ƽ�IS%�����#X�s�h�HI�Js��N��X\$�S����4�����9(�8�0��h�Jj�>&���**4��삠������@F�?',�����*�{/��H���.��ѓ���\$n�8��ݢ�C���*�o�Z�I��N����+����]�悈�m܊�����/3	�\$=*�B��#% !�M	C(��aEP�U���̓7:�!H�Ef���г|�/����J1�����2L*��L�mROÊA\$��K� ٧	ڕT�q�l����(�@1T��>�xH&t�A�Ϫ0���jR��4\n|�A	�GIS{�)�\"cP�>\r���&*�2�+�;��U�L�:����%��E����hK0��%%r�5v�1�&E��Tc*]\$�����a(P�)�\$��)�<�:?)!<�At�l�/�j�2?j�	tM�,�E�+o��@ǌ-/%�#`�9(i�w+9Pp@!�b��w��r	)��>\0���P����*��(�|�3o��k[F�I��\"����%���>�	���R\"լ�]v���r���˂NX�d�&��窒֢,z����nN�L��0�c��9�p9��x�B����4�C(ɱ�@4y#0z\r��8Ax^;��p�2\r�H�݅����w�<wCp�4��PD��3����/�C`��X\"�\$6�\0�Ck����|p� �!�4�\n|!�2�\0��\r���X�j2h�=#�SA~6����X�@\$�\n�A�X��;\$� ��-m�����mb!^+UǴ�Nv1�'�=⨷	�:;�ES6#�i1�!1!��&J�\nR?�\$ҖBxS\n�������hI�A�-�\\MY}Df����k��0����L+��*|��S��;�& �è o�X�� y��4�p@�pf\r0`��0T���B��\n��9��H��v|�T��d�Ί:Bh�zD�Ï	��%1�o�X∑P((��!jZ��SvH4D�Q��<����=�D݈+`��c|��0S�9�F��#!9(EGr, H�+(�\"���i>�M�Hy�RN&3�͖��Q�;��и��AK���'��f�I�!���U'�y�R�'ZO���D�ySZd��q�O�o8!A	�L���Y�a�\$쭺�BIg�@_����P�*P@\n&��%�jvL��A%B����(L�ֻוdf��YC��o�F�����(�˗�\n,�)�/�����aE��Y��\$99	 �'d���\"(��JLcN(�����=����d�gT\r1�h�D.O\"2v	�\\P�?\n�f3��x5�S\n,�l�[�����iG����dyr/\"5H7J*VvL�i�V�֣��I17+��VvMJ�ywX�aj�2,!�iۥEm?`u���&XA��r�<P�[���g��%ĐP[3�p:�.L��FK��~���&CS;:xm����]��uB�%!V�*�Qi��2�|k��:��պ	T�F[��)�̲�\\nWkp\0�ŕ�fg�d��c���b#9�&�',B�i&����G��r'x�.�yӞb~|�Řg\$˚�A>�f�Eb5~Z.��.V�⅔�Fp�1GE��숵�*��Th��3�����<j5e2z�t�k-gB��u�N�f����W�o�L̹�ΰ�Ί\"7�gң�}k䢋���c���=DS\"��J�-5��m|meh��r�\$��%��ZyKia��HL@Xō3/������.	�L2�FC� 3�K\\��!(�h7��]�RL�`2�S��x���\"����;��ݖ��,����)�Hh3H�2�i���A1+C�d.����Ӄ��5|��xIIB���݄�s�E�u	Q\"��;)��~�`WagR\n�w����,��(��Ͼ.�?��W1�客xkݥ��2�+˕�\"��S��M��{�2�*1\$���l� �Q�7]I���k�xI����T�+�]��&��h�}q�\nG2;0�����Cl�����B�f�� tZ_ц7���r|��'��1�}����_��NJ����~��/����/�*0yV\$3�(��E�I�F���c���ޢ�-j�^/ �L�a�/����P,���N�lvnT�D�\"�Y�@8��\r,F+��mf��<�FՐJ;���D����0����0D�H��QJ�7�Z�P`�\r4�P*��Ȭ�/����吢5���*�0�gL�P���\"����/�>J�^*��\\+�.�F��\nV'�e(c��t,r�\$���c��U����Y�xs**�\r��Y��2h�W-�W�l-�X�JV�!0�\\ʺ��>����f���>㫀����4������^�/��o]d��\"���F�7���uo.��>����+�h��\0��&�C��1��z�q~͑�0Ѿ��_����Md��,e�:�Х1����E�7�8��,j�\$���0Y��qd��E�q,Y�].�o�!�L?�0\"�q0�&����#��8Z�^���D���w�S\0=H�;\$�\"�O&�j�%��%�r��������iщ\n�(�FՆ�&Q�ґ\"��P�\$&\0�FZ����;���{)1��;��/%\rrU+2�����O���\"\"L7,�%Ff�N�\"��/���p'R�aQ�6��rb/�b�/��\$�l_���H���R��#h:er��;07\n�3�50���H��&e�?�[\"�Q�h���fdb*@ɒXZ��H�Cc��'��_ g�Z��9/1'ӘՓ��\08M��1�KM���es�8�+J���o�%�<�t��}=H�������	s�	��@�j`�k�5q\\�,\n���!%J b��v����r\0ă�Į\0��Z\0@} Ƃ���Oq�:�6k��,�9����u�\n̬\nҴL�����2���6l���4�@M����7de@��:�'h���g\0��.��@�q�NA2>G���~�d������gH��&��H@S�DC��Ƅ�a>Q.��X��x@�.o��O*��)%���P�9�g�aO�����4MR+�Rs/�NP-�f.�2���F\0��KB� �-�h\\�Z�n�i�D)H��=+T�2-U��YKW���zG�L�c\$h��O�ŔffŨ*���,��8\"F(`b,�ET�*6S0�Oc����*h���4�Gd��\0u�M�[�:q�r���Q�΅�>gu�+�N�cdL�My@�\$��"; break;
		case "ta": $compressed = "�W* �i��F�\\Hd_�����+�BQp�� 9���t\\U�����@�W��(<�\\��@1	|�@(:�\r��	�S.WA��ht�]�R&����\\�����I`�D�J�\$��:��TϠX��`�*���rj1k�,�Յz@%9���5|�Ud�ߠj䦸�����ɾ&{,��M���S_�Rj����^��8<�Z�+���e~`��- u�L��T�����&����R��	M��HI@�b�ҷ�����2x:M�3I��G�oe[���a���\\�JQ��a�r�^)\\�jr����qȮP\"���%r*W@h���)�����\0�\n��5��6�8��ځ�r��61aˑ�B��J�`F��XF��P)����7��Ɩ J��hf�4�J��КR�G������8�7��,��+�J#(��|�K*J�\\)��{\nG������2����2�,+2~)����D��R�A�|\"�O��F+��㯨*�ʍ\"��P#Q�����ϫt�+��@���%ǰt4�մ�]W�2��E�\\����ԵS5�C��Jϣ�O)jmX�@�a];@������s�]���Д�Į+��s�f��\$X���-�:Ԩ�C`�'{)�̏b����=P��p=v�wj9scG_u����l��(�Ȥ%v����6�-=�eB&9h)�#������:����q-g�9�P ��8�2��~�O�~Y���]A�(��/;�^e�����x�\\�'p&�+���_\\��R�����s�M)qFd��9ń�����6��1\r�*@1�#p)�\"b��[V�#ϴ��h�I��~�G7x��v�]��}[�>�W�fzt�}�vk�Wo����I\ny����,0��L���	��k�\\���>.�Uv/u]�z�u����ȼ��~o/t��K��aN;D/Bm�e\nI�\r��:��L�tpH�\"e���'aOhй�P�Mj�\\O1_<����}i�f����{�e�;s.��j�f���r�bAA)� �R\r9�za68ll�۰@���%������3]�A�Z�[�k�Ɉ����|2��ʥ�`��A�1\n�����\r\\�Q�0Sdb8�R\r��Btj��Sh�10�k�\\�N0:#)�!�F'	�E�,o\\�_�Խ�\$KE\$*ȶ2�\$�Uб7�'�}��K�M���|ݛR�U-��D���haOj\$	�üda�<\0���\$L������\"\r�:\0t�xw�@���Ԇ�At��N��x�!���Ć��4��1Ȇ�D�	B3G�:�^A�`�2�@��t\r�00��C��Q!���H�[�agh�0�3^+��h%�����f\0PP	@�G����J�d��t|`)d�6&�}E�\$��<Cf-��)�Iq����s�!��#k���JcY��SUqU���n��䡎�8�H����ʄ� ��W�z���qTQ�萔⼈�\"��\0�)����F�O\naR�:u�Ŭ5�z�\\��gs*R�F.�'Xs�ܘ.�=;�G�f@c<��4�p��s@�g�V|T],�O!|Z%�W��o����@PJEP1[P@���q��;����4r,�4�((� ��2�Ñ���e��n�[�ɖQɸ�%Nl���T�^ʛ檛\\#�RA�GS�W-�`8�fS�Uα5*w\r+|G9������!���O�ڔX�x�5�B_*���m\nVvXJmX�6��8�y-b_bx\n���8�����\n��e#`KQ����(����^��P�5�Pg\r\0��SJI<-рM5�\"�H��.r~re_U���-���?C�:Ik�V��t�Վ\rư��B�����0V	��^���w���1�\n�\0\r��0����c\rh0���~�9J\\U��>��\".����4D㡍�6�RH��P�*]��� E	�j��˯��؏&:��Jح��Xh��>_�@P������H�jVn�\rΫثb�&қ �}Dv\n�+�=�5��ܣK_@\n�S��*	�D�!�:Û�R\"���QL�\\��^ۑ����\\����p�/�l�����FXYJE(��UU��V�d����o�;�#�a�O6xR���b�R���S~�U&)\\�H�\$���3\n:�z�n�;�a�{8x�Y�=\"` ��)=��q|��o)���>��!� J������%���c��)�o�Pk�s�\"�eUsJ�K�iw���c��ڵ:X�� h������2ƹ9�*�(�hG )_BiQ��)\$<�SU�QO�m��l�U��ŌJ�#���G�M��v��o1�kp���JURdHW�k�Pʱ^��X��@���q�p�8�.򾐾l �\n��a�����Gx�oT&��,��50���J�O�b���ħ��� �p\$��\0�R��K�6�����\0,p.�\r���&�j�z�/%�h�th�0�����O�&�������(M�/4c���\r	p0�G��,D��:cPt�0�R(0��x�^���~��(ϑ\rNP}-��p���X��(P�-?%���IN���-�)R��:ǉR��SLHKŀ�j��P�+\n��Ȕ�ʩ1��P��z����oH��{�#��M�JId�#����Lk\rg�Ǎwnf��Z��L\0���4�g����HX��Y�T�7������,�N��pC�d�#\"����P��@�P����H/���`_g�	\$�����1�\n���&ć��8d+��`�%\0ܢ`�HK�q��j\$�����q�\r24qg�F�D&��'T����c�9�>>����8��nZQRZ�T-�� �\\���ѐ�\nl6\\NE!N~�Ȫ�NS(�����2���ꐰ22��*e�w� ��+�_Rȓ�?�ƋC��,��ѯ�_�8oQ`2O���+1�.�Y��	�>N&�ϛ(O�⤽'�	\"��j� �R�1M�-�k�<�y��4.�-�ivO�����o\0���\\�3*2xSFBP�I0C5 �\0� ���pM��-G4�~��F��n�7	�\\���9Q�����s��O:��33J�G5�u,O�61�;�[6��{3�/���*��=R�.LS=ϦťTF��,�5��.���s�����`�R�-����:��wR� t	=2�=�%04(|-AA��/S�q�se�v�<��3D2��C4Q=h�_E��Q�?N��%4Hʇ�-��1x>��n!�����2�e��V�Z�p*��N���xQ7:��F�f#bUT�\0�Q6�TسN�0]�.g�JΓL\\�0ҕ����T/LTi �T����*ާUF0���@�8�u�4ڬQ�>�1H��/ӷF���m).����܏ċ3�4��N����1Bz'�OPr�{TK��\r\0�<@��F�`�*Xf0�T�y紆p����.K�\n��.��L���pR����Z��|�L��4��3��	R�D�< QX��7��\n\0���SG��Y�QY�3ZOK	QP�d�T���,�Vw�T�Q�`�S��5J��B��eH�tF�����vTOP��c�:�C*�MQ�P�QQ�UR�IS1�S�OEf9d�8�4v��1,f�Z����Q`܀�c�KV�f�O�@������Qij	5�d�]E6N诔S�b ֕i��>G�hP�LvM?V�P�k/9kv�k��6�j��S�b��i�Yf�!/�=��nX��tO�R/��Gfq��,��lL�O��s����V�	't�S���.�PU5 ��f)Kh�W=NG<�m;V�u4�vϏm�;m�[>�7F�vg����\$�Tpj\\x��cof;y+~<�Em�Kb/�g4+�--w�҇=�n`��0��]/�zT-:֡l4m\r�UN�|7�h7��W�?5#b��u��Fw_@�_w��4Azr�w��zXw�|V�Dw|��7@P3����[~w�R=8�9�Ӆ{w���v�g-o�MB��Rlnߘp��{Ü���?�w�C>�7G�`]��v��6�	k�u��5���c��`��Qr��Kt�o����jx��׫������T���{q�zZl�Gj�k,�AWB�t���s�%�X���p�������\$RY��_�y�Θ�uY�T�xㅸlR�		��`�GA_v�AG�t%���f'K��6���J�G�O��}j_���6�s�Ŵ�S��N������̌lq,E�X�9�\r2!P��kQ�<ӄ������}�Z8���|�/�xQא�Qy����J�[+9��tGQ���q���3�3�ҌA�(d�\r�Vm\\`����X\r��\$\n&\r� \r �+����һ`�ˊ2J.���\n���p��\$�+�s�v�1��[kJ�v�{�o���г�x��Xdҙ�v��z�B����r�@�ь�gqQ	��pp�q��K���v&W�=J�2p�W��\r�r<̺��6{Zs��(X�e\"\0�oVTN�/J��a���ړ�m	���0����@�d���k����f�71HGpwn�����C+s���d\rA�:�g8jFxr�(ҵg�����N�������W+�@��\\b�Tf^�[%�\rC��*X��x���qf\0�\$���� q�L<Z 3��\r �X[o��.ڍ\\B�A�d/�M�QW;r���U�Z�'F��x�l�����H��j9���u��D�yP<C����@Ɩ��2�W2�zX�C�q��(I���\$�����\0��Iͼ�T����\"%_\nC���=��,\0��F{#���M�W�\$�9mT\$����!ec�9)n�P�E8�[��MaE\n����\0�n�Vb�1�v�9eA�<�`	\0�@�	�t\n`�"; break;
		case "tr": $compressed = "E6�M�	�i=�BQp�� 9������ 3����!��i6`'�y�\\\nb,P!�= 2�̑H���o<�N�X�bn���)̅'��b��)��:GX���n�O����T�l&#a�A\$5��)\0(�u6&�Y�@u=\\Γ�\n~d�͍1�q�@k�\\��D�/y:L`��y�Oo����:ц�9Hc࢙��|0��:�I�Ze^M�;a��e�,\rrH(�S̦�a�FL4��:-''\"m�M�Z}��X� ����r�������k\0��h0��:��s2���Ʉ��4�0�9H�L��ύ���2�oQ>:0mZȜ'����B�P��0�2|:F���₉3��b��c\"l��HK<��H)�/،7��Z�\r����\n��O��4�C����H���¼�@P�1p������:�c�\"�2SV6��Ʋ�-H�ٴ���ø���0�@P��#�#ďί3����9\n���E@P�%�T�&;�8:�T;\r9QJ�I���R�Ȱ2R�<b�95B\"45��)�\rqJ���L�N��R]DT�=O<?��81�<�A\0P!�b���P�:H�\\G�ڞ2#\\�9,��䓈C\n����@�W����/�\"|�����:����v���؟_Ϟ�`��>9�2��X\r���32WM֌=*������`9Z�8�6��J�	�v��;����<�2\\a�.4c0z\r��8Ax^;�p�2 #r<\$�8^��c�\"7 �\0^N��n:i��ȹ�a|\$��������^0��\"��|ep ���\r#�@8#͞�72�P���Љc7JCɄ��(a#_?\n4H:��\n-�'�/K&�*�ؓ�ie�� l��-���9ҕHAy���	�H���i>�u6R�/�rO\r�ZlϏ,��(	☨ף�6?ݏ,4���Hj�p^:-v|(�<۠��C9�S���2�PG\n\n`\$�d7���`C�z\r�m� ��z����E�0Tt��30�I\\s��a��<��9�e��ݨ��I��H��fjGL8<p衬���45��	b!5@nJ�Jd9��Ј�؟qj�Z�]X��A���1��� et���ba�v{�����,Cc\$�#\0�jJ��EG�<Rʑ��mSI�\nu�B�&]J8��R�s-DԤe�xya<��P�*U�8eˤ�G�㢺�Bg���\0�\n@T�\"���+e|��q�Z�X0o,��,���N�v8�bk����ܰzL��5�E�ףY�`'��`@C��<&�� ������#�`@I������7�̩�ב7�I`�!+��t�.��#�Gc�zJ]\n�`��T�#���K�0\$�'���5#\0��ٱ̦�Q�SSq�y�(g�����D��VJ�]+ʎ���fg�t�˒m5'�љ�f�M`F���W�|�1D2�#&���Z#����e�_����X�2�I�f�����d� \$)�Tg]ש?U�<�c`��pPr݄�Cv��S�D���(��Z}��t��r!c��������D'c�z��e�;`�-������YcR�#���\\�8K�\r�at��ғ�E�j�x�F'�R:ͅhK%�䳲NΑԬ���p����)����RD�r�VR۟6\\)�	��=SdEE�QE�����|�	n��d^��\\I���R����I�,k�����@�0p#�ؘ?��Y���2)�'�eHHd�yP�n�b`ɂ�iL&���d�gq�p���7\$�a���,\\�M5���#���J����B�\r3�\\�Y���\r��p��t���̄^3Cp��t�ٻ<�ɺv���4(�Q�=H�� �Z��F.g��eu��\"��>f\0A�qQ�3��a�TP�E�\0@rn�Y�yoQD=<�2��1	dj򇪐��:�%�5=�T�\"�?��\$l���.t��-��բ46�O�\0�,�S��F�V�f�ұ6/kd}�'�݁(��pXm�h0�0���MS=A�\$��x��Zl�s�7�*޻�X��I�.&\r)>i\"���dJ��T��6��]+�\0��K�	�p:\\]bkb����1�8�_8�ߕn�K%�F4\r\$5SSIPCqDŲ	¹�\\K�5�:λ�b��8.�@��읁0j�L�U`�oz�y��S�vo9�X���<��cK��]���#f���3�M�ʜ6&��{Va�v`\nG�������r���tSU��iH��'��\$s��8J#��>ʌ�b���x�G})��mX�|���3|�u�����R�ޫ�|5��)�����=�k���>'䰏-�)�]�v�fLY���\\���K�����&f]�쮲�.f*lw��b���zf����\$�L���p��\\�m���\$K^�h>k�� �\"��\\���n��b#T��ڰ��������,\"��CC��{ʢ%�0�`c�\r�V>GLR���H:\\�&� `�\n���pa,,p��Z݉��#�qEh����M\nE\n�y\0�΅��&��@��xE�Z7&j+>Ј����P^���&L�odf���'�RQ��fZ4��w�H\"��0�HV�6\"�~��.���`�/\0\\%��*�dY�#CR�'�/�����0&xH��B�qX��� c�\$\"0�\n�d�%���2ꎆΪun;0�I�p͂JӉP�M*M/Y��L�@�eED�dFH�L#@�A�`�b��`m�*���lN��I��Y��\r��֥J'�.NJ,J��R<\r`�ņh7�Ds�b��\0C�@ �"; break;
		case "uk": $compressed = "�I4�ɠ�h-`��&�K�BQp�� 9��	�r�h-��-}[��Z����H`R������db��rb�h�d��Z��G��H�����\r�Ms6@Se+ȃE6�J�Td�Jsh\$g�\$�G��f�j>������l�]H_F�M<�h����Ѩ�*�6�J�29��<Oq2��y���,*Q��=����\$�*!`,�b���eqQ�HZe���M�\\e��E3�¯�c���b��hR뽭E%�@�q���/�A�Hx�4��еq��#s�au��ƙ�\\{ �Y���K3E���\$E�4I��=J�G�E\n��oɡ	;�� ��b��OjZ����� �\0�N�l�<,1��2��(�cIÍ:b���)�Q��z�BѪV^��4RBl�@N��G#H\n��+2�k%��h��ƂS/ q�\0�(j�5�h�.�<��ؤ��G'4��K)-��(3�n�K�6�%	����)+�����%e�cJ��\"ɬIxN��̡Q��-C��#-�-��!�,��� hSNMx�V�tƽ�b4�m:��ŬLڼK�Y/R�&��\nJ]D�̜�9H| h=��d�Ҍ��;�s��B0�6\r�\0�0�C`ʌc�\nb��F�ty�7t���IK'!�ԑ?+��)US2����&):�t�B��|\"� ͮB��9#�B�]\r�*Wc��;�*IW&�\r\r�s\\ܖVQ�W�ՑC�E�[���X�ɤ�9�D�4{l��.Z���]a.�c`�91�����0@!�b��u\$C� �尮��2�����,�������-O�H���o/���2�1��	J��.�/\\�����;��S���R!��򴝂6s���j��3�3Q²�c�צ֓�epmJ�7*˯j�����t���(S0{͎d�)���0�c��9��9��x�O���4�C(ɾ�@�f��4@��/����hi\rϬ? ��(n�����C|K�0� �C����D�Hm�6���xa�0CP�z����־�Ht}��6��l�#5/����_�Ҁ\$�&`@@P�M�sn��X(,��8��S�Q�6�Ш��#\n��x	֣�B�k\\��_�D�A\n#�(END����T�(�v��^�P,���A[�ixO9ޚ�T�q�G'��C�ZӚ#o��<���[�M)4��ȾTY��J��r�y��K��/H!���H�yY2��{h.91�κʓf��l��pT��oX����A�\r��:�0���A�3���0i_@�;����P�!�O�d��TI�9��FXv��\r_�&lי��l%�3t�1�Y-e<7%ݙ�x-��5�n��f\$����0�M�Ӧ��3\$��%��N�)���Ukb�y����'Mn�G��u8��`�Q���d���,��Sz��H�6u~��=P�&�ݮ�bA��h\\g^i5�����.&6��fQi\na%�t�7:,\"��+	��`f�DUu�h�yu�j�蒻�c>�`�'2|�����CB�U�0���c@J��r�i1�Jd�sW�,���^�K\\С�hH��*b��.bD�)��Ή]�r�\n����Q=ǃ��Ir�NjQ��oH�j��i1��UaM�	A ��s,qk8h#Z�TVL�c=-�jӵV��	���)z� M1=j�-.�1kUa\rZ�\nj�l�����1И�&����R��G�T�(`F���E�I��S�%+�МwQ.m+[0�e��� ����N��<ե��:��E�\\�q\$RZĳ#�pH�9���Þ����>E|/h�T��:�K�W�0�f�O�=��F?4��G\n��5���0dĩv'L����#�5\n>�g�(�CKg!IDd�Ք+Wh���O�%p�}@��y�'V�]^�T�օC[8�/��כ<�)�R}��Ė(MAk\r���M���Sh�\r{�u.���e�i�C_�6[~��IH6�/���en�]2��{�3�:T��T���\\��x.�U��r��k�8Oֹ�K���\nF\$|l��\"�,�:|Y;�&ʸ�������z^u{6�u;����yC�o1��څy�*d��'%��M�Ϝ�q��R�R�(�V#m׽�zT!,dh�W�]�wnn���B���iL��κziVG��^���w�˓Q�H�����D	g�1���K_�RͭlƎwO\0�h� \r�8 �AW�'k�\"OP�_R�\r�ѯu�l��W�K�?d�s��G\0������Bt���a��1���sI=C��ౘ��([�<^�\$���b�\neQ��x�sk#���5�����ǣOcA*s�A�i&��TEȺ_��ⶴ�\$���R�\\y��c�\0��5	\"�+�u��F��l.�dd��삒���E��/Ȫo � ��i�;�.��6!2�\nZ!k��@R�P @���g���*�����x�F�\\@cʙ6�p�f�c�R�����jJcP{\nI9\n�k��4�bL�ľ�p�gJ��ǥeNd����P�ePFi��CM����i�JRLB�J��B�ex�d��n��ܝG���\\���mv�ؑ�m�dʑ�v/m5\$6(���;P���9�{Io\${q �VK�P�**.'�)�D��Zʍ�?�&��	\r϶�pĳ����������1�!l���;q��A���X��~�#d�g�(��)��.��\$��IL�\$���n��u'�Eo�K�Tu�p��S	���*D\"����nyg��G�2�F:B��g<OѦ�Q�L�Fl��c\0%���派Q2������\r	0`Ą���&0F�,J����B�2t��O��������e(,N��kr��R��'�*х1�,0�b�Ҕ���,v�o�t��Q0Y)��F���乃fE�̰�t�����~�?#�Lw�Mk��&���VS�Kp�O�(�c�б\"A�����'�,��M�#3�k��r�����hw%�Q3Rb�C3J�4Ƥ,ZV��6��A3\$��+���r�K0�x��������@:H�*��n�.�>��:I]+��4��:�aS����+���&2�;��b�)+/r�Ґ=��<�G>s�1[2r�pJ�����c7)»��>�YL��S�BdU'�_�\$�l�+�7GA/�A�<�����C�<�2�^�EI2���2N�Bь��F��>T5=P�G�_G�.�3�4��aJD�\\�fg�8F�� �z�^��e�p�\n�����hv���SIL�0�L��J��M�MDT��=M�SL���rr>Zf&��%l*�¬ӁJd�4��Q4)QR����3���ýN5)Ԅ�\r�Q�O��m`�rLP�3���R��\n��8�?+Ժ �t\$*'���E�\r��} @H��`�\n���p2h��@��ͬ�f�s�P<h��<O���YG��D&͔��ҳ��Z��Eճ\\�\"Cb@\$Ine-`K�h��.j��+�R�ZD��BR���{[#x7�*ͣV�(ܙ�iAJ�Q�]��cr���5�4��d 	����VD�\0�~E����a4p�Φ�V�ʬΏ����=�0�n�t8��{��Bl�..�g�]g6�`b��nEJ���YhQd;P�GGP��� q.;B@�q��L�䶲�֤���r��G�,�&�{�[_XI�V�P��>����t[����A��Ձ%%Mx����賉 ՅvR��R@B�Ĝ6����βd^����o�VN�g��K,1h�4c	/�;�Fc&qP�s��t+?�n�/9�+;S�=�����\0�[�pwc�{�"; break;
		case "zh": $compressed = "�^��s�\\�r����|%��:�\$\nr.���2�r/d�Ȼ[8� S�8�r�!T�\\�s���I4�b�r��ЀJs!Kd�u�e�V���D�X�T��NTr}ʧE�VJr%С���B�S�^�t*���ΔT[U�x���_�\\��ۙ�r�R��l�	@FUP���J����u�B�T���dB�α]�S�2UaPK�R�Yr}̗[:R�Jڵ.�V)�+(���M�Q`S�z�s�ӕ�:�\0�r���Uꊶ�K��.u���S�J*g�x�-�(�ڽ�P e��26\n]ni2ԗ��0_��1@���\$seKZX?�rZL�9H]:\$��O�i6Zġrt�3�_D�DT�)Myv]%	r��%:�F9��,tĊ2\r��E%��'\n���.\$�\\H	i N壼��g1���k�\r�q\$r�D|�L��l�H ��0��I*_ͅ2�E�#�`���6�\0�1�#p)�\"a�H���Ig)x���C=�%�/͐	�ԧ1P��s����ua7T��Rs��S?G1:A�\$� ���)\nR�)�řPt���fr֤�aW/�UW��t�\n P�:M�FJ�\0�)�B0@���9F*�IF��yH�)��r���/h�v�I:D�.��Kq:r��,r]�V���^b%~&�0;j�8���~[Pl	�-M��DY�l2ˉ��:��@8gC��7�R@�<H�2��p@!\0ѥ���D4����x﯅��6�#vzh�8^2��X�\rØ�7�0�C8�:j��H�a|\$���6탠x�!�9�@�4\r�@�7�#�F�#�����,K!9	��Ls,k,RW�Pbt\n@�0�Cr�����\n:D��AlB�r`�YI�n�61\\Z����-ϑDO�QAǲ�T��ݠ�)�����*�q��6�I!�)������\$,�/H*�^�\\,����n�����b\r!�)@�0iQ��;�����R) 4�V���A�6��z�:�5�!n���gȢS��.�Ь=@+]l��ַ�h�c�T��xKA[�a��-�0�?O�{CA8+��B,D_�wh�é1N=2�C�������+��4�0얮b��Z\"U[.�]:?|\"�K-D��,xA<'\0� A\n�I�P�B`E�g|K�8� ���4�եD��R�G1�C�5\0���U\"�LaH9D\0�%�I}�Z-�K�#\",�\"0.Qs<E�#�)���Sh���by�K�yժ�T�aмub�c�q6+�0��Ly�(	���i\ngx\$Oiy���~��V�غN��I��ҳ\$��Y�_)�'<VL*B&D��`�a(?h`��h���%�|R��t�֠�H����|(D`楔�'��P	RB?w��^��\$�l�t�%K��Ha���-U�	��N�|:3�-�d{\"��K%|��0S+!\"c\"�s�<Z�r8�dۙ�'0�K��B�d8����-¼���[-OK�=��p��I�\$�F�\0\$���Eq�9��*ls�\$�@*�t��A6�����Y*�P���ﶃ�G���nEq�f6�e,��@a�\0�79���LQ���9x ag� 4����c�T,L��{�T�ȶ:\"���L�o1����[�K2�h�G~��2���g���dVZ-����DRthx�4��LG�\\#�5E��ar��G.�3��\\\r:'!��s�U�H��|B�ᕱ ��8�ı�^Cȏ\r���eu4��,�V����#%M������w!U�G�q����l�r����9S`��c�1�*Pi�k;��d{�/�d���:|笙@���`�'�Q\$#-�����u��<�'D���M[(*b�D�(�Gأ)��ߑU�'U�)��JNCDc����w��W�>�l��Ks����	�ɪ�n\"�i�0-���\$#}�v�͠�*ol-�H\nf{T�`�e���	K1�ۂ�m�uHNb�&�拴D'O@�VB�����\$u�T{[+c�7GsN�E[�4&ݼ��%ˤ�/�1��t�Eq���^�Ҟ\n�6\$��6'���4��B�o&�����9I��ܡ��-���'�;�'rgϹ�;�����\$V)��D=ܟ����6'H��3u.�^k��7�����D|z7_4�ꔋs.�hi���'\$�\r[B~mS3\$r(�k:0ҽ�\n\"�H���X�aBQ�&��z�+�P�Q��������`+a�4�0�����6Uu�k�\r!�<�:�4Q��:��@��\n\n�P#�p`c�A�3�J�P�h�Y+-���8/b\0�-Զ(�T�|P�J*� l!}����P�������W�Y�/!����N��Bp�L�����p�H�&��Q\$x�D\$F:m��\n+\n��z���bX�Z��9m�߬BX\n��� �+����\0��J\r �i�H�\r��`�c�1��Ki�[���L&¥��)`�+�f�d3t8�2�,:De�\$\"��,%�G\nX@��Z�0 -�*�O\"YC4�|����,�����.b6,�i`�d�b�#v@�	\0t	��@�\n`"; break;
		case "zh-tw": $compressed = "�^��%ӕ\\�r�����|%��u:H�B(\\�4��p�r��neRQ̡D8� S�\n�t*.t�I&�G�N��AʤS�V�:	t%9��Sy:\"<�r�ST�.�����r}ʧE��I'2q�Y���dˡB��K��B�=1@��:R��U��w�Dy�D%��h�<�r�b)��e7�&�p��q��i�U�ʣS��0w�B\n�P�����*����iu-�>�L��)d��Z�s����t�t�4ȅ�]l�t-�����\0���m��M�2�]*��5۝j��/VZ�f��\\,�	�s�^C j�е-�AV��%�\\R�e�pr\$)��`Q�@�1&C�o2.S�9t�2���e��J)!Dtĳ�EQd:�FkY`r�e��P�i>[��b.[�Ax턣 @1,�P9�0�1\r�i^���,M��) D)d�8�,'!v]��!��9zW)dq\$��2��T�� �P�ʎ��J��AL��h�zNB0�6\r�\0�0�C`�c�7B��&��{5�YI�k	�B4ʔi�1����q��-�\$MWG�;[<u�O[@�1<[W�YX���iWª����AU�Dlub-�w[��!Qc,0�3\r�C`�9\"��lD&� @!�b��K\r�[0��Y�C���&^:)��r��sA	�ϙ�D�@)���4�)~הA�Qg)*O���;���!e���F`�>K���ĭ��1\"t�K@&�#�.9��9��x�'2���9� \\�@4k�0z\r��8Ax^;�p�2\r�H�2�Av�3�����3�^R��3����/�4���H�8SCk0:�x�3ØA��@�'�>0�A\0�B���O��rĲ,�4Z%�)�T/q	٬�L�]��Y^s��(	�o��}�jB!�B��iIZ�[5�jN2\"��)�jܜ�qk.��~���dE��(	☨Y!TO�9q��M�&���0�FF���1@�A�&\"����h�o��O���{s\r�1��L�4��@�Kb�P(B0ܓ�K�j��°��j�oټ;\"0F�\\��,��̌@�'���.��:�XB-qĵptE���.Q�+�R]\"�,@a\nXJ@�\" ���&�B�=�<ǜ\$���wN��9պ:D`�(��;��,��(Ts\nBP�j�@��r��~(���]��\$41	(��%,�s7��M?äF�R�%��\n	�8P�T��^@�,�<&(HI��#�]LIę!cbl�j�QIX\\#�:;�Q�4r�D,(�2(T��)�Kg�4��\"�H�e�\\����S4(��5�2ȸ�C�^̊U��T0�A|!�0�\\M��v&Uȹ�H��K)i-�x�ac��Ղ��=*\"�ã�����G �ʴ�غ.���-�+M�y�F]'��.��:�ڗ./K�5�,O�Q�*hZ\"�	02\$T����v�� �ٺMH�<��b:D��x�R�qv)&z�Hr��3\$~�D@�����=�]^����>HE��':˒&Nz�0�e��-3� �(���V�\"Z �x��R#�]E!1�\"�Q|'�!�>���31@ n	���T�Q!�]h�VU2Z�#�l5�eT�t������A��Sq��fV~(�&eC�S<�Þ��J����Ύ�bY~��a�0�@@�0pA�)��( ��0�u,NS\ni�*�b&п���\na�.E��9�y\$��Z�1 ���OQpd��Wp��Q�-����&�s�{�,Ȳo#�|�.e�/k��df3c�hG�#D�6F�/\\��s�%�k�+�Dh�\rby�J�)�2ު�Q\"�S=�[�&�X�#�K\niY�:��N,_cM��n���?H�ȴ���Y4�\n��e�*U����OO.����LW��U�Q#Mz�i������k�e�7��W����-&���'�!k���ƕ�h��\$#/��Ĳ&H\"	p�x7��	\r��\r�Y��3r����٤�k#��Y����T.��R<%(��_)wqn�Ji�<���Z�ͤ[t�!�p5d�۪h���ȷ��<9�.FP�i-Gƨ/��K�q����O�\"�b#QsʓW,��K�U)Y�����|�	c���!ØW���A�S��0rb#O��ğ�Q�<r�hTD����\"�u�����[ip��iR�[�q�Q��|T��t��M��ȫ�ބ�q8�S0�/\\�}��Ցg�������/i0>?�f�9����7�w\$���df\\�S�V}�B���Κ����駨�Ҕ�s�=�Ĵ����G�x��5i\$�z��kD/��������5:�E�K�I���\0��t��P{���àR!�F/H����X��XG�!�{��\\��Gmz�#@e�\r�V`�\r �\r`@d���\r��`>t`���u@�v@���6\r��iĞSf엠��Z(��0\r��vJ�(���F�#B8��6���,X�,�8x/J��K�Ic�dH���<�G�G�)g��c\n�	�B����.k�@.UH�,�|� ��pBB�ȍ\$z)��X<j�fL~o������<c@\n�6c����6@�3\0� �F�vE����f����MZ����C��I��j)����8b,H��\n0�6U���,�k\"�/��R)p�\n����v�l �����!���B���`�.�T�������v8�	\0�@�	�t\n`�"; break;
	}
	$translations = array();
	foreach (explode("\n", lzw_decompress($compressed)) as $val) {
		$translations[] = (strpos($val, "\t") ? explode("\t", $val) : $val);
	}
	return $translations;
}

if (!$translations) {
	$translations = get_translations($LANG);
}


// PDO can be used in several database drivers
if (extension_loaded('pdo')) {
	/*abstract*/ class Min_PDO extends PDO {
		var $_result, $server_info, $affected_rows, $errno, $error;
		
		function __construct() {
			global $adminer;
			$pos = array_search("SQL", $adminer->operators);
			if ($pos !== false) {
				unset($adminer->operators[$pos]);
			}
		}
		
		function dsn($dsn, $username, $password, $exception_handler = 'auth_error') {
			set_exception_handler($exception_handler); // try/catch is not compatible with PHP 4
			parent::__construct($dsn, $username, $password);
			restore_exception_handler();
			$this->setAttribute(13, array('Min_PDOStatement')); // 13 - PDO::ATTR_STATEMENT_CLASS
			$this->server_info = $this->getAttribute(4); // 4 - PDO::ATTR_SERVER_VERSION
		}
		
		/*abstract function select_db($database);*/
		
		function query($query, $unbuffered = false) {
			$result = parent::query($query);
			$this->error = "";
			if (!$result) {
				list(, $this->errno, $this->error) = $this->errorInfo();
				return false;
			}
			$this->store_result($result);
			return $result;
		}
		
		function multi_query($query) {
			return $this->_result = $this->query($query);
		}
		
		function store_result($result = null) {
			if (!$result) {
				$result = $this->_result;
				if (!$result) {
					return false;
				}
			}
			if ($result->columnCount()) {
				$result->num_rows = $result->rowCount(); // is not guaranteed to work with all drivers
				return $result;
			}
			$this->affected_rows = $result->rowCount();
			return true;
		}
		
		function next_result() {
			if (!$this->_result) {
				return false;
			}
			$this->_result->_offset = 0;
			return @$this->_result->nextRowset(); // @ - PDO_PgSQL doesn't support it
		}
		
		function result($query, $field = 0) {
			$result = $this->query($query);
			if (!$result) {
				return false;
			}
			$row = $result->fetch();
			return $row[$field];
		}
	}
	
	class Min_PDOStatement extends PDOStatement {
		var $_offset = 0, $num_rows;
		
		function fetch_assoc() {
			return $this->fetch(2); // PDO::FETCH_ASSOC
		}
		
		function fetch_row() {
			return $this->fetch(3); // PDO::FETCH_NUM
		}
		
		function fetch_field() {
			$row = (object) $this->getColumnMeta($this->_offset++);
			$row->orgtable = $row->table;
			$row->orgname = $row->name;
			$row->charsetnr = (in_array("blob", (array) $row->flags) ? 63 : 0);
			return $row;
		}
	}
}

$drivers = array();


$drivers["sqlite"] = "SQLite 3";
$drivers["sqlite2"] = "SQLite 2";

if (isset($_GET["sqlite"]) || isset($_GET["sqlite2"])) {
	$possible_drivers = array((isset($_GET["sqlite"]) ? "SQLite3" : "SQLite"), "PDO_SQLite");
	define("DRIVER", (isset($_GET["sqlite"]) ? "sqlite" : "sqlite2"));
	if (class_exists(isset($_GET["sqlite"]) ? "SQLite3" : "SQLiteDatabase")) {
		if (isset($_GET["sqlite"])) {
			
			class Min_SQLite {
				var $extension = "SQLite3", $server_info, $affected_rows, $errno, $error, $_link;
				
				function Min_SQLite($filename) {
					$this->_link = new SQLite3($filename);
					$version = $this->_link->version();
					$this->server_info = $version["versionString"];
				}
				
				function query($query) {
					$result = @$this->_link->query($query);
					$this->error = "";
					if (!$result) {
						$this->errno = $this->_link->lastErrorCode();
						$this->error = $this->_link->lastErrorMsg();
						return false;
					} elseif ($result->numColumns()) {
						return new Min_Result($result);
					}
					$this->affected_rows = $this->_link->changes();
					return true;
				}
				
				function quote($string) {
					return (is_utf8($string)
						? "'" . $this->_link->escapeString($string) . "'"
						: "x'" . reset(unpack('H*', $string)) . "'"
					);
				}
				
				function store_result() {
					return $this->_result;
				}
				
				function result($query, $field = 0) {
					$result = $this->query($query);
					if (!is_object($result)) {
						return false;
					}
					$row = $result->_result->fetchArray();
					return $row[$field];
				}
			}
			
			class Min_Result {
				var $_result, $_offset = 0, $num_rows;
				
				function Min_Result($result) {
					$this->_result = $result;
				}
				
				function fetch_assoc() {
					return $this->_result->fetchArray(SQLITE3_ASSOC);
				}
				
				function fetch_row() {
					return $this->_result->fetchArray(SQLITE3_NUM);
				}
				
				function fetch_field() {
					$column = $this->_offset++;
					$type = $this->_result->columnType($column);
					return (object) array(
						"name" => $this->_result->columnName($column),
						"type" => $type,
						"charsetnr" => ($type == SQLITE3_BLOB ? 63 : 0), // 63 - binary
					);
				}
				
				function __desctruct() {
					return $this->_result->finalize();
				}
			}
			
		} else {
			
			class Min_SQLite {
				var $extension = "SQLite", $server_info, $affected_rows, $error, $_link;
				
				function Min_SQLite($filename) {
					$this->server_info = sqlite_libversion();
					$this->_link = new SQLiteDatabase($filename);
				}
				
				function query($query, $unbuffered = false) {
					$method = ($unbuffered ? "unbufferedQuery" : "query");
					$result = @$this->_link->$method($query, SQLITE_BOTH, $error);
					$this->error = "";
					if (!$result) {
						$this->error = $error;
						return false;
					} elseif ($result === true) {
						$this->affected_rows = $this->changes();
						return true;
					}
					return new Min_Result($result);
				}
				
				function quote($string) {
					return "'" . sqlite_escape_string($string) . "'";
				}
				
				function store_result() {
					return $this->_result;
				}
				
				function result($query, $field = 0) {
					$result = $this->query($query);
					if (!is_object($result)) {
						return false;
					}
					$row = $result->_result->fetch();
					return $row[$field];
				}
			}
			
			class Min_Result {
				var $_result, $_offset = 0, $num_rows;
				
				function Min_Result($result) {
					$this->_result = $result;
					if (method_exists($result, 'numRows')) { // not available in unbuffered query
						$this->num_rows = $result->numRows();
					}
				}
				
				function fetch_assoc() {
					$row = $this->_result->fetch(SQLITE_ASSOC);
					if (!$row) {
						return false;
					}
					$return = array();
					foreach ($row as $key => $val) {
						$return[($key[0] == '"' ? idf_unescape($key) : $key)] = $val;
					}
					return $return;
				}
				
				function fetch_row() {
					return $this->_result->fetch(SQLITE_NUM);
				}
				
				function fetch_field() {
					$name = $this->_result->fieldName($this->_offset++);
					$pattern = '(\\[.*]|"(?:[^"]|"")*"|(.+))';
					if (preg_match("~^($pattern\\.)?$pattern\$~", $name, $match)) {
						$table = ($match[3] != "" ? $match[3] : idf_unescape($match[2]));
						$name = ($match[5] != "" ? $match[5] : idf_unescape($match[4]));
					}
					return (object) array(
						"name" => $name,
						"orgname" => $name,
						"orgtable" => $table,
					);
				}
				
			}
			
		}
		
	} elseif (extension_loaded("pdo_sqlite")) {
		class Min_SQLite extends Min_PDO {
			var $extension = "PDO_SQLite";
			
			function Min_SQLite($filename) {
				$this->dsn(DRIVER . ":$filename", "", "");
			}
		}
		
	}

	if (class_exists("Min_SQLite")) {
		class Min_DB extends Min_SQLite {
			
			function Min_DB() {
				$this->Min_SQLite(":memory:");
			}
			
			function select_db($filename) {
				if (is_readable($filename) && $this->query("ATTACH " . $this->quote(ereg("(^[/\\\\]|:)", $filename) ? $filename : dirname($_SERVER["SCRIPT_FILENAME"]) . "/$filename") . " AS a")) { // is_readable - SQLite 3
					$this->Min_SQLite($filename);
					return true;
				}
				return false;
			}
			
			function multi_query($query) {
				return $this->_result = $this->query($query);
			}
			
			function next_result() {
				return false;
			}
		}
	}
	
	function idf_escape($idf) {
		return '"' . str_replace('"', '""', $idf) . '"';
	}

	function table($idf) {
		return idf_escape($idf);
	}

	function connect() {
		return new Min_DB;
	}

	function get_databases() {
		return array();
	}

	function limit($query, $where, $limit, $offset = 0, $separator = " ") {
		return " $query$where" . ($limit !== null ? $separator . "LIMIT $limit" . ($offset ? " OFFSET $offset" : "") : "");
	}

	function limit1($query, $where) {
		global $connection;
		return ($connection->result("SELECT sqlite_compileoption_used('ENABLE_UPDATE_DELETE_LIMIT')") ? limit($query, $where, 1) : " $query$where");
	}

	function db_collation($db, $collations) {
		global $connection;
		return $connection->result("PRAGMA encoding"); // there is no database list so $db == DB
	}

	function engines() {
		return array();
	}

	function logged_user() {
		return get_current_user(); // should return effective user
	}

	function tables_list() {
		return get_key_vals("SELECT name, type FROM sqlite_master WHERE type IN ('table', 'view') ORDER BY (name = 'sqlite_sequence'), name", 1);
	}

	function count_tables($databases) {
		return array();
	}

	function table_status($name = "") {
		global $connection;
		$return = array();
		foreach (get_rows("SELECT name AS Name, type AS Engine FROM sqlite_master WHERE type IN ('table', 'view') " . ($name != "" ? "AND name = " . q($name) : "ORDER BY name")) as $row) {
			$row["Oid"] = 1;
			$row["Auto_increment"] = "";
			$row["Rows"] = $connection->result("SELECT COUNT(*) FROM " . idf_escape($row["Name"]));
			$return[$row["Name"]] = $row;
		}
		foreach (get_rows("SELECT * FROM sqlite_sequence", null, "") as $row) {
			$return[$row["name"]]["Auto_increment"] = $row["seq"];
		}
		return ($name != "" ? $return[$name] : $return);
	}

	function is_view($table_status) {
		return $table_status["Engine"] == "view";
	}
	
	function fk_support($table_status) {
		global $connection;
		return !$connection->result("SELECT sqlite_compileoption_used('OMIT_FOREIGN_KEY')");
	}

	function fields($table) {
		$return = array();
		foreach (get_rows("PRAGMA table_info(" . table($table) . ")") as $row) {
			$type = strtolower($row["type"]);
			$default = $row["dflt_value"];
			$return[$row["name"]] = array(
				"field" => $row["name"],
				"type" => (eregi("int", $type) ? "integer" : (eregi("char|clob|text", $type) ? "text" : (eregi("blob", $type) ? "blob" : (eregi("real|floa|doub", $type) ? "real" : "numeric")))),
				"full_type" => $type,
				"default" => (ereg("'(.*)'", $default, $match) ? str_replace("''", "'", $match[1]) : ($default == "NULL" ? null : $default)),
				"null" => !$row["notnull"],
				"auto_increment" => eregi('^integer$', $type) && $row["pk"], //! possible false positive
				"privileges" => array("select" => 1, "insert" => 1, "update" => 1),
				"primary" => $row["pk"],
			);
		}
		return $return;
	}

	function indexes($table, $connection2 = null) {
		$return = array();
		$primary = array();
		foreach (fields($table) as $field) {
			if ($field["primary"]) {
				$primary[] = $field["field"];
			}
		}
		if ($primary) {
			$return[""] = array("type" => "PRIMARY", "columns" => $primary, "lengths" => array());
		}
		$sqls = get_key_vals("SELECT name, sql FROM sqlite_master WHERE type = 'index' AND tbl_name = " . q($table));
		foreach (get_rows("PRAGMA index_list(" . table($table) . ")") as $row) {
			$name = $row["name"];
			if (!ereg("^sqlite_", $name)) {
				$return[$name]["type"] = ($row["unique"] ? "UNIQUE" : "INDEX");
				$return[$name]["lengths"] = array();
				foreach (get_rows("PRAGMA index_info(" . idf_escape($name) . ")") as $row1) {
					$return[$name]["columns"][] = $row1["name"];
				}
				$return[$name]["descs"] = array();
				if (eregi('^CREATE( UNIQUE)? INDEX ' . quotemeta(idf_escape($name) . ' ON ' . idf_escape($table)) . ' \((.*)\)$', $sqls[$name], $regs)) {
					preg_match_all('/("[^"]*+")+( DESC)?/', $regs[2], $matches);
					foreach ($matches[2] as $val) {
						$return[$name]["descs"][] = ($val ? '1' : null);
					}
				}
			}
		}
		return $return;
	}

	function foreign_keys($table) {
		$return = array();
		foreach (get_rows("PRAGMA foreign_key_list(" . table($table) . ")") as $row) {
			$foreign_key = &$return[$row["id"]];
			//! idf_unescape in SQLite2
			if (!$foreign_key) {
				$foreign_key = $row;
			}
			$foreign_key["source"][] = $row["from"];
			$foreign_key["target"][] = $row["to"];
		}
		return $return;
	}

	function view($name) {
		global $connection;
		return array("select" => preg_replace('~^(?:[^`"[]+|`[^`]*`|"[^"]*")* AS\\s+~iU', '', $connection->result("SELECT sql FROM sqlite_master WHERE name = " . q($name)))); //! identifiers may be inside []
	}

	function collations() {
		return (isset($_GET["create"]) ? get_vals("PRAGMA collation_list", 1) : array());
	}

	function information_schema($db) {
		return false;
	}

	function error() {
		global $connection;
		return h($connection->error);
	}
	
	function check_sqlite_name($name) {
		// avoid creating PHP files on unsecured servers
		global $connection;
		$extensions = "db|sdb|sqlite";
		if (!preg_match("~^[^\\0]*\\.($extensions)\$~", $name)) {
			$connection->error = lang(11, str_replace("|", ", ", $extensions));
			return false;
		}
		return true;
	}
	
	function create_database($db, $collation) {
		global $connection;
		if (file_exists($db)) {
			$connection->error = lang(12);
			return false;
		}
		if (!check_sqlite_name($db)) {
			return false;
		}
		$link = new Min_SQLite($db); //! exception handler
		$link->query('PRAGMA encoding = "UTF-8"');
		$link->query('CREATE TABLE adminer (i)'); // otherwise creates empty file
		$link->query('DROP TABLE adminer');
		return true;
	}
	
	function drop_databases($databases) {
		global $connection;
		$connection->Min_SQLite(":memory:"); // to unlock file, doesn't work in PDO on Windows
		foreach ($databases as $db) {
			if (!@unlink($db)) {
				$connection->error = lang(12);
				return false;
			}
		}
		return true;
	}
	
	function rename_database($name, $collation) {
		global $connection;
		if (!check_sqlite_name($name)) {
			return false;
		}
		$connection->Min_SQLite(":memory:");
		$connection->error = lang(12);
		return @rename(DB, $name);
	}
	
	function auto_increment() {
		return " PRIMARY KEY" . (DRIVER == "sqlite" ? " AUTOINCREMENT" : "");
	}
	
	function alter_table($table, $name, $fields, $foreign, $comment, $engine, $collation, $auto_increment, $partitioning) {
		$use_all_fields = ($table == "" || $foreign);
		foreach ($fields as $field) {
			if ($field[0] != "" || !$field[1] || $field[2]) {
				$use_all_fields = true;
				break;
			}
		}
		$alter = array();
		$originals = array();
		$primary_key = false;
		foreach ($fields as $field) {
			if ($field[1]) {
				if ($field[1][6]) {
					$primary_key = true;
				}
				$alter[] = ($use_all_fields ? "  " : "ADD ") . implode($field[1]);
				if ($field[0] != "") {
					$originals[$field[0]] = $field[1][0];
				}
			}
		}
		if ($use_all_fields) {
			if ($table != "") {
				queries("BEGIN");
				foreach (foreign_keys($table) as $foreign_key) {
					$columns = array();
					foreach ($foreign_key["source"] as $column) {
						if (!$originals[$column]) {
							continue 2;
						}
						$columns[] = $originals[$column];
					}
					$foreign[] = "  FOREIGN KEY (" . implode(", ", $columns) . ") REFERENCES "
						. table($foreign_key["table"])
						. " (" . implode(", ", array_map('idf_escape', $foreign_key["target"]))
						. ") ON DELETE $foreign_key[on_delete] ON UPDATE $foreign_key[on_update]"
					;
				}
				$indexes = array();
				foreach (indexes($table) as $key_name => $index) {
					$columns = array();
					foreach ($index["columns"] as $column) {
						if (!$originals[$column]) {
							continue 2;
						}
						$columns[] = $originals[$column];
					}
					$columns = "(" . implode(", ", $columns) . ")";
					if ($index["type"] != "PRIMARY") {
						$indexes[] = array($index["type"], $key_name, $columns);
					} elseif (!$primary_key) {
						$foreign[] = "  PRIMARY KEY $columns";
					}
				}
			}
			$alter = array_merge($alter, $foreign);
			if (!queries("CREATE TABLE " . table($table != "" ? "adminer_$name" : $name) . " (\n" . implode(",\n", $alter) . "\n)")) {
				// implicit ROLLBACK to not overwrite $connection->error
				return false;
			}
			if ($table != "") {
				if ($originals && !queries("INSERT INTO " . table("adminer_$name") . " (" . implode(", ", $originals) . ") SELECT " . implode(", ", array_map('idf_escape', array_keys($originals))) . " FROM " . table($table))) {
					return false;
				}
				$triggers = array();
				foreach (triggers($table) as $trigger_name => $timing_event) {
					$trigger = trigger($trigger_name);
					$triggers[] = "CREATE TRIGGER " . idf_escape($trigger_name) . " " . implode(" ", $timing_event) . " ON " . table($name) . "\n$trigger[Statement]";
				}
				if (!queries("DROP TABLE " . table($table))) { // drop before creating indexes and triggers to allow using old names
					return false;
				}
				queries("ALTER TABLE " . table("adminer_$name") . " RENAME TO " . table($name));
				if (!alter_indexes($name, $indexes)) {
					return false;
				}
				foreach ($triggers as $trigger) {
					if (!queries($trigger)) {
						return false;
					}
				}
				queries("COMMIT");
			}
		} else {
			foreach ($alter as $val) {
				if (!queries("ALTER TABLE " . table($table) . " $val")) {
					return false;
				}
			}
			if ($table != $name && !queries("ALTER TABLE " . table($table) . " RENAME TO " . table($name))) {
				return false;
			}
		}
		if ($auto_increment) {
			queries("UPDATE sqlite_sequence SET seq = $auto_increment WHERE name = " . q($name)); // ignores error
		}
		return true;
	}
	
	function index_sql($table, $type, $name, $columns) {
		return "CREATE $type " . ($type != "INDEX" ? "INDEX " : "")
			. idf_escape($name != "" ? $name : uniqid($table . "_"))
			. " ON " . table($table)
			. " $columns"
		;
	}
	
	function alter_indexes($table, $alter) {
		foreach (array_reverse($alter) as $val) {
			if (!queries($val[2] == "DROP"
				? "DROP INDEX " . idf_escape($val[1])
				: index_sql($table, $val[0], $val[1], $val[2])
			)) {
				return false;
			}
		}
		return true;
	}
	
	function truncate_tables($tables) {
		return apply_queries("DELETE FROM", $tables);
	}
	
	function drop_views($views) {
		return apply_queries("DROP VIEW", $views);
	}
	
	function drop_tables($tables) {
		return apply_queries("DROP TABLE", $tables);
	}
	
	function move_tables($tables, $views, $target) {
		return false;
	}
	
	function trigger($name) {
		global $connection;
		if ($name == "") {
			return array("Statement" => "BEGIN\n\t;\nEND");
		}
		preg_match('~^CREATE\\s+TRIGGER\\s*(?:[^`"\\s]+|`[^`]*`|"[^"]*")+\\s*([a-z]+)\\s+([a-z]+)\\s+ON\\s*(?:[^`"\\s]+|`[^`]*`|"[^"]*")+\\s*(?:FOR\\s*EACH\\s*ROW\\s)?(.*)~is', $connection->result("SELECT sql FROM sqlite_master WHERE name = " . q($name)), $match);
		return array("Timing" => strtoupper($match[1]), "Event" => strtoupper($match[2]), "Trigger" => $name, "Statement" => $match[3]);
	}
	
	function triggers($table) {
		$return = array();
		foreach (get_rows("SELECT * FROM sqlite_master WHERE type = 'trigger' AND tbl_name = " . q($table)) as $row) {
			preg_match('~^CREATE\\s+TRIGGER\\s*(?:[^`"\\s]+|`[^`]*`|"[^"]*")+\\s*([a-z]+)\\s*([a-z]+)~i', $row["sql"], $match);
			$return[$row["name"]] = array($match[1], $match[2]);
		}
		return $return;
	}
	
	function trigger_options() {
		return array(
			"Timing" => array("BEFORE", "AFTER", "INSTEAD OF"),
			"Type" => array("FOR EACH ROW"),
		);
	}
	
	function routine($name, $type) {
		// not supported by SQLite
	}
	
	function routines() {
		// not supported by SQLite
	}
	
	function routine_languages() {
		// not supported by SQLite
	}
	
	function begin() {
		return queries("BEGIN");
	}
	
	function insert_into($table, $set) {
		return queries("INSERT INTO " . table($table) . ($set ? " (" . implode(", ", array_keys($set)) . ")\nVALUES (" . implode(", ", $set) . ")" : "DEFAULT VALUES"));
	}
	
	function insert_update($table, $set, $primary) {
		return queries("REPLACE INTO " . table($table) . " (" . implode(", ", array_keys($set)) . ") VALUES (" . implode(", ", $set) . ")");
	}
	
	function last_id() {
		global $connection;
		return $connection->result("SELECT LAST_INSERT_ROWID()");
	}
	
	function explain($connection, $query) {
		return $connection->query("EXPLAIN $query");
	}
	
	function found_rows($table_status, $where) {
	}
	
	function types() {
		return array();
	}
	
	function schemas() {
		return array();
	}
	
	function get_schema() {
		return "";
	}
	
	function set_schema($scheme) {
		return true;
	}
	
	function create_sql($table, $auto_increment) {
		global $connection;
		$return = $connection->result("SELECT sql FROM sqlite_master WHERE type IN ('table', 'view') AND name = " . q($table));
		foreach (indexes($table) as $name => $index) {
			if ($name == '') {
				continue;
			}
			$return .= ";\n\n" . index_sql($table, $index['type'], $name, "(" . implode(", ", array_map('idf_escape', $index['columns'])) . ")");
		}
		return $return;
	}
	
	function truncate_sql($table) {
		return "DELETE FROM " . table($table);
	}
	
	function use_sql($database) {
	}
	
	function trigger_sql($table, $style) {
		return implode(get_vals("SELECT sql || ';;\n' FROM sqlite_master WHERE type = 'trigger' AND tbl_name = " . q($table)));
	}
	
	function show_variables() {
		global $connection;
		$return = array();
		foreach (array("auto_vacuum", "cache_size", "count_changes", "default_cache_size", "empty_result_callbacks", "encoding", "foreign_keys", "full_column_names", "fullfsync", "journal_mode", "journal_size_limit", "legacy_file_format", "locking_mode", "page_size", "max_page_count", "read_uncommitted", "recursive_triggers", "reverse_unordered_selects", "secure_delete", "short_column_names", "synchronous", "temp_store", "temp_store_directory", "schema_version", "integrity_check", "quick_check") as $key) {
			$return[$key] = $connection->result("PRAGMA $key");
		}
		return $return;
	}
	
	function show_status() {
		$return = array();
		foreach (get_vals("PRAGMA compile_options") as $option) {
			list($key, $val) = explode("=", $option, 2);
			$return[$key] = $val;
		}
		return $return;
	}
	
	function convert_field($field) {
	}
	
	function unconvert_field($field, $return) {
		return $return;
	}
	
	function support($feature) {
		return ereg('^(view|trigger|variables|status|dump|move_col|drop_col)$', $feature);
	}
	
	$jush = "sqlite";
	$types = array("integer" => 0, "real" => 0, "numeric" => 0, "text" => 0, "blob" => 0);
	$structured_types = array_keys($types);
	$unsigned = array();
	$operators = array("=", "<", ">", "<=", ">=", "!=", "LIKE", "LIKE %%", "IN", "IS NULL", "NOT LIKE", "NOT IN", "IS NOT NULL", "SQL"); // REGEXP can be user defined function
	$functions = array("hex", "length", "lower", "round", "unixepoch", "upper");
	$grouping = array("avg", "count", "count distinct", "group_concat", "max", "min", "sum");
	$edit_functions = array(
		array(
			// "text" => "date('now')/time('now')/datetime('now')",
		), array(
			"integer|real|numeric" => "+/-",
			// "text" => "date/time/datetime",
			"text" => "||",
		)
	);
}


$drivers["pgsql"] = "PostgreSQL";

if (isset($_GET["pgsql"])) {
	$possible_drivers = array("PgSQL", "PDO_PgSQL");
	define("DRIVER", "pgsql");
	if (extension_loaded("pgsql")) {
		class Min_DB {
			var $extension = "PgSQL", $_link, $_result, $_string, $_database = true, $server_info, $affected_rows, $error;
			
			function _error($errno, $error) {
				if (ini_bool("html_errors")) {
					$error = html_entity_decode(strip_tags($error));
				}
				$error = ereg_replace('^[^:]*: ', '', $error);
				$this->error = $error;
			}
			
			function connect($server, $username, $password) {
				global $adminer;
				$db = $adminer->database();
				set_error_handler(array($this, '_error'));
				$this->_string = "host='" . str_replace(":", "' port='", addcslashes($server, "'\\")) . "' user='" . addcslashes($username, "'\\") . "' password='" . addcslashes($password, "'\\") . "'";
				$this->_link = @pg_connect("$this->_string dbname='" . ($db != "" ? addcslashes($db, "'\\") : "postgres") . "'", PGSQL_CONNECT_FORCE_NEW);
				if (!$this->_link && $db != "") {
					// try to connect directly with database for performance
					$this->_database = false;
					$this->_link = @pg_connect("$this->_string dbname='postgres'", PGSQL_CONNECT_FORCE_NEW);
				}
				restore_error_handler();
				if ($this->_link) {
					$version = pg_version($this->_link);
					$this->server_info = $version["server"];
					pg_set_client_encoding($this->_link, "UTF8");
				}
				return (bool) $this->_link;
			}
			
			function quote($string) {
				return "'" . pg_escape_string($this->_link, $string) . "'"; //! bytea
			}
			
			function select_db($database) {
				global $adminer;
				if ($database == $adminer->database()) {
					return $this->_database;
				}
				$return = @pg_connect("$this->_string dbname='" . addcslashes($database, "'\\") . "'", PGSQL_CONNECT_FORCE_NEW);
				if ($return) {
					$this->_link = $return;
				}
				return $return;
			}
			
			function close() {
				$this->_link = @pg_connect("$this->_string dbname='postgres'");
			}
			
			function query($query, $unbuffered = false) {
				$result = @pg_query($this->_link, $query);
				$this->error = "";
				if (!$result) {
					$this->error = pg_last_error($this->_link);
					return false;
				} elseif (!pg_num_fields($result)) {
					$this->affected_rows = pg_affected_rows($result);
					return true;
				}
				return new Min_Result($result);
			}
			
			function multi_query($query) {
				return $this->_result = $this->query($query);
			}
			
			function store_result() {
				return $this->_result;
			}
			
			function next_result() {
				// PgSQL extension doesn't support multiple results
				return false;
			}
			
			function result($query, $field = 0) {
				$result = $this->query($query);
				if (!$result || !$result->num_rows) {
					return false;
				}
				return pg_fetch_result($result->_result, 0, $field);
			}
		}
		
		class Min_Result {
			var $_result, $_offset = 0, $num_rows;
			
			function Min_Result($result) {
				$this->_result = $result;
				$this->num_rows = pg_num_rows($result);
			}
			
			function fetch_assoc() {
				return pg_fetch_assoc($this->_result);
			}
			
			function fetch_row() {
				return pg_fetch_row($this->_result);
			}
			
			function fetch_field() {
				$column = $this->_offset++;
				$return = new stdClass;
				if (function_exists('pg_field_table')) {
					$return->orgtable = pg_field_table($this->_result, $column);
				}
				$return->name = pg_field_name($this->_result, $column);
				$return->orgname = $return->name;
				$return->type = pg_field_type($this->_result, $column);
				$return->charsetnr = ($return->type == "bytea" ? 63 : 0); // 63 - binary
				return $return;
			}
			
			function __destruct() {
				pg_free_result($this->_result);
			}
		}
		
	} elseif (extension_loaded("pdo_pgsql")) {
		class Min_DB extends Min_PDO {
			var $extension = "PDO_PgSQL";
			
			function connect($server, $username, $password) {
				global $adminer;
				$db = $adminer->database();
				$string = "pgsql:host='" . str_replace(":", "' port='", addcslashes($server, "'\\")) . "' options='-c client_encoding=utf8'";
				$this->dsn("$string dbname='" . ($db != "" ? addcslashes($db, "'\\") : "postgres") . "'", $username, $password);
				//! connect without DB in case of an error
				return true;
			}
			
			function select_db($database) {
				global $adminer;
				return ($adminer->database() == $database);
			}
			
			function close() {
			}
		}
		
	}
	
	function idf_escape($idf) {
		return '"' . str_replace('"', '""', $idf) . '"';
	}

	function table($idf) {
		return idf_escape($idf);
	}

	function connect() {
		global $adminer;
		$connection = new Min_DB;
		$credentials = $adminer->credentials();
		if ($connection->connect($credentials[0], $credentials[1], $credentials[2])) {
			if ($connection->server_info >= 9) {
				$connection->query("SET application_name = 'Adminer'");
			}
			return $connection;
		}
		return $connection->error;
	}
	
	function get_databases() {
		return get_vals("SELECT datname FROM pg_database ORDER BY datname");
	}
	
	function limit($query, $where, $limit, $offset = 0, $separator = " ") {
		return " $query$where" . ($limit !== null ? $separator . "LIMIT $limit" . ($offset ? " OFFSET $offset" : "") : "");
	}

	function limit1($query, $where) {
		return " $query$where";
	}
	
	function db_collation($db, $collations) {
		global $connection;
		return $connection->result("SHOW LC_COLLATE"); //! respect $db
	}

	function engines() {
		return array();
	}
	
	function logged_user() {
		global $connection;
		return $connection->result("SELECT user");
	}
	
	function tables_list() {
		return get_key_vals("SELECT table_name, table_type FROM information_schema.tables WHERE table_schema = current_schema() ORDER BY table_name");
	}
	
	function count_tables($databases) {
		return array(); // would require reconnect
	}

	function table_status($name = "") {
		$return = array();
		foreach (get_rows("SELECT relname AS \"Name\", CASE relkind WHEN 'r' THEN 'table' ELSE 'view' END AS \"Engine\", pg_relation_size(oid) AS \"Data_length\", pg_total_relation_size(oid) - pg_relation_size(oid) AS \"Index_length\", obj_description(oid, 'pg_class') AS \"Comment\", relhasoids::int AS \"Oid\", reltuples as \"Rows\"
FROM pg_class
WHERE relkind IN ('r','v')
AND relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
" . ($name != "" ? "AND relname = " . q($name) : "ORDER BY relname")
		) as $row) { //! Index_length, Auto_increment
			$return[$row["Name"]] = $row;
		}
		return ($name != "" ? $return[$name] : $return);
	}
	
	function is_view($table_status) {
		return $table_status["Engine"] == "view";
	}
	
	function fk_support($table_status) {
		return true;
	}
	
	function fields($table) {
		$return = array();
		$aliases = array(
			'timestamp without time zone' => 'timestamp',
			'timestamp with time zone' => 'timestamptz',
		);
		foreach (get_rows("SELECT a.attname AS field, format_type(a.atttypid, a.atttypmod) AS full_type, d.adsrc AS default, a.attnotnull::int, col_description(c.oid, a.attnum) AS comment
FROM pg_class c
JOIN pg_namespace n ON c.relnamespace = n.oid
JOIN pg_attribute a ON c.oid = a.attrelid
LEFT JOIN pg_attrdef d ON c.oid = d.adrelid AND a.attnum = d.adnum
WHERE c.relname = " . q($table) . "
AND n.nspname = current_schema()
AND NOT a.attisdropped
AND a.attnum > 0
ORDER BY a.attnum"
		) as $row) {
			//! collation, primary
			$type = $row["full_type"];
			if (ereg('(.+)\\((.*)\\)$', $row["full_type"], $match)) {
				list(, $type, $row["length"]) = $match;
			}
			$row["type"] = ($aliases[$type] ? $aliases[$type] : $type);
			$row["full_type"] = $row["type"] . ($row["length"] ? "($row[length])" : "");
			$row["null"] = !$row["attnotnull"];
			$row["auto_increment"] = eregi("^nextval\\(", $row["default"]);
			$row["privileges"] = array("insert" => 1, "select" => 1, "update" => 1);
			if (preg_match('~^(.*)::.+$~', $row["default"], $match)) {
				$row["default"] = ($match[1][0] == "'" ? idf_unescape($match[1]) : $match[1]);
			}
			$return[$row["field"]] = $row;
		}
		return $return;
	}
	
	function indexes($table, $connection2 = null) {
		global $connection;
		if (!is_object($connection2)) {
			$connection2 = $connection;
		}
		$return = array();
		$table_oid = $connection2->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = " . q($table));
		$columns = get_key_vals("SELECT attnum, attname FROM pg_attribute WHERE attrelid = $table_oid AND attnum > 0", $connection2);
		foreach (get_rows("SELECT relname, indisunique::int, indisprimary::int, indkey, indoption FROM pg_index i, pg_class ci WHERE i.indrelid = $table_oid AND ci.oid = i.indexrelid", $connection2) as $row) {
			$relname = $row["relname"];
			$return[$relname]["type"] = ($row["indisprimary"] ? "PRIMARY" : ($row["indisunique"] ? "UNIQUE" : "INDEX"));
			$return[$relname]["columns"] = array();
			foreach (explode(" ", $row["indkey"]) as $indkey) {
				$return[$relname]["columns"][] = $columns[$indkey];
			}
			$return[$relname]["descs"] = array();
			foreach (explode(" ", $row["indoption"]) as $indoption) {
				$return[$relname]["descs"][] = ($indoption & 1 ? '1' : null); // 1 - INDOPTION_DESC
			}
			$return[$relname]["lengths"] = array();
		}
		return $return;
	}
	
	function foreign_keys($table) {
		global $on_actions;
		$return = array();
		foreach (get_rows("SELECT conname, pg_get_constraintdef(oid) AS definition
FROM pg_constraint
WHERE conrelid = (SELECT pc.oid FROM pg_class AS pc INNER JOIN pg_namespace AS pn ON (pn.oid = pc.relnamespace) WHERE pc.relname = " . q($table) . " AND pn.nspname = current_schema())
AND contype = 'f'::char
ORDER BY conkey, conname") as $row) {
			if (preg_match('~FOREIGN KEY\s*\((.+)\)\s*REFERENCES (.+)\((.+)\)(.*)$~iA', $row['definition'], $match)) {
				$row['source'] = array_map('trim', explode(',', $match[1]));
				$row['table'] = $match[2];
				if (preg_match('~(.+)\.(.+)~', $match[2], $match2)) {
					$row['ns'] = $match2[1];
					$row['table'] = $match2[2];
				}
				$row['target'] = array_map('trim', explode(',', $match[3]));
				$row['on_delete'] = (preg_match("~ON DELETE ($on_actions)~", $match[4], $match2) ? $match2[1] : 'NO ACTION');
				$row['on_update'] = (preg_match("~ON UPDATE ($on_actions)~", $match[4], $match2) ? $match2[1] : 'NO ACTION');
				$return[$row['conname']] = $row;
			}
		}
		return $return;
	}
	
	function view($name) {
		global $connection;
		return array("select" => $connection->result("SELECT pg_get_viewdef(" . q($name) . ")"));
	}
	
	function collations() {
		//! supported in CREATE DATABASE
		return array();
	}
	
	function information_schema($db) {
		return ($db == "information_schema");
	}
	
	function error() {
		global $connection;
		$return = h($connection->error);
		if (preg_match('~^(.*\\n)?([^\\n]*)\\n( *)\\^(\\n.*)?$~s', $return, $match)) {
			$return = $match[1] . preg_replace('~((?:[^&]|&[^;]*;){' . strlen($match[3]) . '})(.*)~', '\\1<b>\\2</b>', $match[2]) . $match[4];
		}
		return nl_br($return);
	}
	
	function create_database($db, $collation) {
		return queries("CREATE DATABASE " . idf_escape($db) . ($collation ? " ENCODING " . idf_escape($collation) : ""));
	}
	
	function drop_databases($databases) {
		global $connection;
		$connection->close();
		return apply_queries("DROP DATABASE", $databases, 'idf_escape');
	}
	
	function rename_database($name, $collation) {
		//! current database cannot be renamed
		return queries("ALTER DATABASE " . idf_escape(DB) . " RENAME TO " . idf_escape($name));
	}
	
	function auto_increment() {
		return "";
	}
	
	function alter_table($table, $name, $fields, $foreign, $comment, $engine, $collation, $auto_increment, $partitioning) {
		$alter = array();
		$queries = array();
		foreach ($fields as $field) {
			$column = idf_escape($field[0]);
			$val = $field[1];
			if (!$val) {
				$alter[] = "DROP $column";
			} else {
				$val5 = $val[5];
				unset($val[5]);
				if (isset($val[6]) && $field[0] == "") { // auto_increment
					$val[1] = ($val[1] == "bigint" ? " big" : " ") . "serial";
				}
				if ($field[0] == "") {
					$alter[] = ($table != "" ? "ADD " : "  ") . implode($val);
				} else {
					if ($column != $val[0]) {
						$queries[] = "ALTER TABLE " . table($table) . " RENAME $column TO $val[0]";
					}
					$alter[] = "ALTER $column TYPE$val[1]";
					if (!$val[6]) {
						$alter[] = "ALTER $column " . ($val[3] ? "SET$val[3]" : "DROP DEFAULT"); //! quoting
						$alter[] = "ALTER $column " . ($val[2] == " NULL" ? "DROP NOT" : "SET") . $val[2];
					}
				}
				if ($field[0] != "" || $val5 != "") {
					$queries[] = "COMMENT ON COLUMN " . table($table) . ".$val[0] IS " . ($val5 != "" ? substr($val5, 9) : "''");
				}
			}
		}
		$alter = array_merge($alter, $foreign);
		if ($table == "") {
			array_unshift($queries, "CREATE TABLE " . table($name) . " (\n" . implode(",\n", $alter) . "\n)");
		} elseif ($alter) {
			array_unshift($queries, "ALTER TABLE " . table($table) . "\n" . implode(",\n", $alter));
		}
		if ($table != "" && $table != $name) {
			$queries[] = "ALTER TABLE " . table($table) . " RENAME TO " . table($name);
		}
		if ($table != "" || $comment != "") {
			$queries[] = "COMMENT ON TABLE " . table($name) . " IS " . q($comment);
		}
		if ($auto_increment != "") {
			//! $queries[] = "SELECT setval(pg_get_serial_sequence(" . q($name) . ", ), $auto_increment)";
		}
		foreach ($queries as $query) {
			if (!queries($query)) {
				return false;
			}
		}
		return true;
	}
	
	function alter_indexes($table, $alter) {
		$create = array();
		$drop = array();
		$queries = array();
		foreach ($alter as $val) {
			if ($val[0] != "INDEX") {
				//! descending UNIQUE indexes results in syntax error
				$create[] = ($val[2] == "DROP"
					? "\nDROP CONSTRAINT " . idf_escape($val[1])
					: "\nADD" . ($val[1] != "" ? " CONSTRAINT " . idf_escape($val[1]) : "") . " $val[0] " . ($val[0] == "PRIMARY" ? "KEY " : "") . $val[2]
				);
			} elseif ($val[2] == "DROP") {
				$drop[] = idf_escape($val[1]);
			} else {
				$queries[] = "CREATE INDEX " . idf_escape($val[1] != "" ? $val[1] : uniqid($table . "_")) . " ON " . table($table) . " $val[2]";
			}
		}
		if ($create) {
			array_unshift($queries, "ALTER TABLE " . table($table) . implode(",", $create));
		}
		if ($drop) {
			array_unshift($queries, "DROP INDEX " . implode(", ", $drop));
		}
		foreach ($queries as $query) {
			if (!queries($query)) {
				return false;
			}
		}
		return true;
	}
	
	function truncate_tables($tables) {
		return queries("TRUNCATE " . implode(", ", array_map('table', $tables)));
		return true;
	}
	
	function drop_views($views) {
		return queries("DROP VIEW " . implode(", ", array_map('table', $views)));
	}
	
	function drop_tables($tables) {
		return queries("DROP TABLE " . implode(", ", array_map('table', $tables)));
	}
	
	function move_tables($tables, $views, $target) {
		foreach ($tables as $table) {
			if (!queries("ALTER TABLE " . table($table) . " SET SCHEMA " . idf_escape($target))) {
				return false;
			}
		}
		foreach ($views as $table) {
			if (!queries("ALTER VIEW " . table($table) . " SET SCHEMA " . idf_escape($target))) {
				return false;
			}
		}
		return true;
	}
	
	function trigger($name) {
		if ($name == "") {
			return array("Statement" => "EXECUTE PROCEDURE ()");
		}
		$rows = get_rows('SELECT trigger_name AS "Trigger", condition_timing AS "Timing", event_manipulation AS "Event", \'FOR EACH \' || action_orientation AS "Type", action_statement AS "Statement" FROM information_schema.triggers WHERE event_object_table = ' . q($_GET["trigger"]) . ' AND trigger_name = ' . q($name));
		return reset($rows);
	}
	
	function triggers($table) {
		$return = array();
		foreach (get_rows("SELECT * FROM information_schema.triggers WHERE event_object_table = " . q($table)) as $row) {
			$return[$row["trigger_name"]] = array($row["condition_timing"], $row["event_manipulation"]);
		}
		return $return;
	}
	
	function trigger_options() {
		return array(
			"Timing" => array("BEFORE", "AFTER"),
			"Type" => array("FOR EACH ROW", "FOR EACH STATEMENT"),
		);
	}
	
	/*
	function routine($name, $type) {
		//! there can be more functions with the same name differing only in parameters, it must be also passed to DROP FUNCTION
		//! no procedures, only functions
		//! different syntax of CREATE FUNCTION
		$rows = get_rows('SELECT pg_catalog.format_type(p.prorettype, NULL) AS "returns", p.prosrc AS "definition"
FROM pg_catalog.pg_namespace n
JOIN pg_catalog.pg_proc p ON p.pronamespace = n.oid
WHERE n.nspname = current_schema() AND p.proname = ' . q($name));
		$rows[0]["fields"] = array(); //!
		return $rows[0];
	}
	*/
	
	function routines() {
		return get_rows('SELECT p.proname AS "ROUTINE_NAME", p.proargtypes AS "ROUTINE_TYPE", pg_catalog.format_type(p.prorettype, NULL) AS "DTD_IDENTIFIER"
FROM pg_catalog.pg_namespace n
JOIN pg_catalog.pg_proc p ON p.pronamespace = n.oid
WHERE n.nspname = current_schema()
ORDER BY p.proname');
	}
	
	function routine_languages() {
		return get_vals("SELECT langname FROM pg_catalog.pg_language");
	}
	
	function begin() {
		return queries("BEGIN");
	}
	
	function insert_into($table, $set) {
		return queries("INSERT INTO " . table($table) . ($set ? " (" . implode(", ", array_keys($set)) . ")\nVALUES (" . implode(", ", $set) . ")" : "DEFAULT VALUES"));
	}
	
	function insert_update($table, $set, $primary) {
		global $connection;
		$update = array();
		$where = array();
		foreach ($set as $key => $val) {
			$update[] = "$key = $val";
			if (isset($primary[idf_unescape($key)])) {
				$where[] = "$key = $val";
			}
		}
		return ($where && queries("UPDATE " . table($table) . " SET " . implode(", ", $update) . " WHERE " . implode(" AND ", $where)) && $connection->affected_rows)
			|| queries("INSERT INTO " . table($table) . " (" . implode(", ", array_keys($set)) . ") VALUES (" . implode(", ", $set) . ")")
		;
	}
	
	function last_id() {
		return 0; // there can be several sequences
	}
	
	function explain($connection, $query) {
		return $connection->query("EXPLAIN $query");
	}
	
	function found_rows($table_status, $where) {
		global $connection;
		if (ereg(
			" rows=([0-9]+)",
			$connection->result("EXPLAIN SELECT * FROM " . idf_escape($table_status["Name"]) . ($where ? " WHERE " . implode(" AND ", $where) : "")),
			$regs
		)) {
			return $regs[1];
		}
		return false;
	}
	
	function types() {
		return get_vals("SELECT typname
FROM pg_type
WHERE typnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
AND typtype IN ('b','d','e')
AND typelem = 0"
		);
	}
	
	function schemas() {
		return get_vals("SELECT nspname FROM pg_namespace ORDER BY nspname");
	}
	
	function get_schema() {
		global $connection;
		return $connection->result("SELECT current_schema()");
	}
	
	function set_schema($schema) {
		global $connection, $types, $structured_types;
		$return = $connection->query("SET search_path TO " . idf_escape($schema));
		foreach (types() as $type) { //! get types from current_schemas('t')
			if (!isset($types[$type])) {
				$types[$type] = 0;
				$structured_types[lang(13)][] = $type;
			}
		}
		return $return;
	}
	
	function use_sql($database) {
		return "\connect " . idf_escape($database);
	}
	
	function show_variables() {
		return get_key_vals("SHOW ALL");
	}

	function process_list() {
		global $connection;
		return get_rows("SELECT * FROM pg_stat_activity ORDER BY " . ($connection->server_info < 9.2 ? "procpid" : "pid"));
	}
	
	function show_status() {
	}
	
	function convert_field($field) {
	}
	
	function unconvert_field($field, $return) {
		return $return;
	}
	
	function support($feature) {
		return ereg('^(comment|view|scheme|processlist|sequence|trigger|type|variables|drop_col)$', $feature); //! routine|
	}
	
	$jush = "pgsql";
	$types = array();
	$structured_types = array();
	foreach (array( //! arrays
		lang(14) => array("smallint" => 5, "integer" => 10, "bigint" => 19, "boolean" => 1, "numeric" => 0, "real" => 7, "double precision" => 16, "money" => 20),
		lang(15) => array("date" => 13, "time" => 17, "timestamp" => 20, "timestamptz" => 21, "interval" => 0),
		lang(16) => array("character" => 0, "character varying" => 0, "text" => 0, "tsquery" => 0, "tsvector" => 0, "uuid" => 0, "xml" => 0),
		lang(17) => array("bit" => 0, "bit varying" => 0, "bytea" => 0),
		lang(18) => array("cidr" => 43, "inet" => 43, "macaddr" => 17, "txid_snapshot" => 0),
		lang(19) => array("box" => 0, "circle" => 0, "line" => 0, "lseg" => 0, "path" => 0, "point" => 0, "polygon" => 0),
	) as $key => $val) { //! can be retrieved from pg_type
		$types += $val;
		$structured_types[$key] = array_keys($val);
	}
	$unsigned = array();
	$operators = array("=", "<", ">", "<=", ">=", "!=", "~", "!~", "LIKE", "LIKE %%", "IN", "IS NULL", "NOT LIKE", "NOT IN", "IS NOT NULL"); // no "SQL" to avoid SQL injection
	$functions = array("char_length", "lower", "round", "to_hex", "to_timestamp", "upper");
	$grouping = array("avg", "count", "count distinct", "max", "min", "sum");
	$edit_functions = array(
		array(
			"char" => "md5",
			"date|time" => "now",
		), array(
			"int|numeric|real|money" => "+/-",
			"date|time" => "+ interval/- interval", //! escape
			"char|text" => "||",
		)
	);
}


$drivers["oracle"] = "Oracle";

if (isset($_GET["oracle"])) {
	$possible_drivers = array("OCI8", "PDO_OCI");
	define("DRIVER", "oracle");
	if (extension_loaded("oci8")) {
		class Min_DB {
			var $extension = "oci8", $_link, $_result, $server_info, $affected_rows, $errno, $error;

			function _error($errno, $error) {
				if (ini_bool("html_errors")) {
					$error = html_entity_decode(strip_tags($error));
				}
				$error = ereg_replace('^[^:]*: ', '', $error);
				$this->error = $error;
			}
			
			function connect($server, $username, $password) {
				$this->_link = @oci_new_connect($username, $password, $server, "AL32UTF8");
				if ($this->_link) {
					$this->server_info = oci_server_version($this->_link);
					return true;
				}
				$error = oci_error();
				$this->error = $error["message"];
				return false;
			}

			function quote($string) {
				return "'" . str_replace("'", "''", $string) . "'";
			}

			function select_db($database) {
				return true;
			}

			function query($query, $unbuffered = false) {
				$result = oci_parse($this->_link, $query);
				$this->error = "";
				if (!$result) {
					$error = oci_error($this->_link);
					$this->errno = $error["code"];
					$this->error = $error["message"];
					return false;
				}
				set_error_handler(array($this, '_error'));
				$return = @oci_execute($result);
				restore_error_handler();
				if ($return) {
					if (oci_num_fields($result)) {
						return new Min_Result($result);
					}
					$this->affected_rows = oci_num_rows($result);
				}
				return $return;
			}

			function multi_query($query) {
				return $this->_result = $this->query($query);
			}
			
			function store_result() {
				return $this->_result;
			}
			
			function next_result() {
				return false;
			}
			
			function result($query, $field = 1) {
				$result = $this->query($query);
				if (!is_object($result) || !oci_fetch($result->_result)) {
					return false;
				}
				return oci_result($result->_result, $field);
			}
		}

		class Min_Result {
			var $_result, $_offset = 1, $num_rows;

			function Min_Result($result) {
				$this->_result = $result;
			}

			function _convert($row) {
				foreach ((array) $row as $key => $val) {
					if (is_a($val, 'OCI-Lob')) {
						$row[$key] = $val->load();
					}
				}
				return $row;
			}
			
			function fetch_assoc() {
				return $this->_convert(oci_fetch_assoc($this->_result));
			}

			function fetch_row() {
				return $this->_convert(oci_fetch_row($this->_result));
			}

			function fetch_field() {
				$column = $this->_offset++;
				$return = new stdClass;
				$return->name = oci_field_name($this->_result, $column);
				$return->orgname = $return->name;
				$return->type = oci_field_type($this->_result, $column);
				$return->charsetnr = (ereg("raw|blob|bfile", $return->type) ? 63 : 0); // 63 - binary
				return $return;
			}
			
			function __destruct() {
				oci_free_statement($this->_result);
			}
		}
		
	} elseif (extension_loaded("pdo_oci")) {
		class Min_DB extends Min_PDO {
			var $extension = "PDO_OCI";
			
			function connect($server, $username, $password) {
				$this->dsn("oci:dbname=//$server;charset=AL32UTF8", $username, $password);
				return true;
			}
			
			function select_db($database) {
				return true;
			}
		}
		
	}
	
	function idf_escape($idf) {
		return '"' . str_replace('"', '""', $idf) . '"';
	}

	function table($idf) {
		return idf_escape($idf);
	}

	function connect() {
		global $adminer;
		$connection = new Min_DB;
		$credentials = $adminer->credentials();
		if ($connection->connect($credentials[0], $credentials[1], $credentials[2])) {
			return $connection;
		}
		return $connection->error;
	}

	function get_databases() {
		return get_vals("SELECT tablespace_name FROM user_tablespaces");
	}

	function limit($query, $where, $limit, $offset = 0, $separator = " ") {
		return ($offset ? " * FROM (SELECT t.*, rownum AS rnum FROM (SELECT $query$where) t WHERE rownum <= " . ($limit + $offset) . ") WHERE rnum > $offset"
			: ($limit !== null ? " * FROM (SELECT $query$where) WHERE rownum <= " . ($limit + $offset)
			: " $query$where"
		));
	}

	function limit1($query, $where) {
		return " $query$where";
	}

	function db_collation($db, $collations) {
		global $connection;
		return $connection->result("SELECT value FROM nls_database_parameters WHERE parameter = 'NLS_CHARACTERSET'"); //! respect $db
	}

	function engines() {
		return array();
	}

	function logged_user() {
		global $connection;
		return $connection->result("SELECT USER FROM DUAL");
	}

	function tables_list() {
		return get_key_vals("SELECT table_name, 'table' FROM all_tables WHERE tablespace_name = " . q(DB) . "
UNION SELECT view_name, 'view' FROM user_views
ORDER BY 1"
		); //! views don't have schema
	}

	function count_tables($databases) {
		return array();
	}
	
	function table_status($name = "") {
		$return = array();
		$search = q($name);
		foreach (get_rows('SELECT table_name "Name", \'table\' "Engine", avg_row_len * num_rows "Data_length", num_rows "Rows" FROM all_tables WHERE tablespace_name = ' . q(DB) . ($name != "" ? " AND table_name = $search" : "") . "
UNION SELECT view_name, 'view', 0, 0 FROM user_views" . ($name != "" ? " WHERE view_name = $search" : "") . "
ORDER BY 1"
		) as $row) {
			if ($name != "") {
				return $row;
			}
			$return[$row["Name"]] = $row;
		}
		return $return;
	}

	function is_view($table_status) {
		return $table_status["Engine"] == "view";
	}
	
	function fk_support($table_status) {
		return true;
	}

	function fields($table) {
		$return = array();
		foreach (get_rows("SELECT * FROM all_tab_columns WHERE table_name = " . q($table) . " ORDER BY column_id") as $row) {
			$type = $row["DATA_TYPE"];
			$length = "$row[DATA_PRECISION],$row[DATA_SCALE]";
			if ($length == ",") {
				$length = $row["DATA_LENGTH"];
			} //! int
			$return[$row["COLUMN_NAME"]] = array(
				"field" => $row["COLUMN_NAME"],
				"full_type" => $type . ($length ? "($length)" : ""),
				"type" => strtolower($type),
				"length" => $length,
				"default" => $row["DATA_DEFAULT"],
				"null" => ($row["NULLABLE"] == "Y"),
				//! "auto_increment" => false,
				//! "collation" => $row["CHARACTER_SET_NAME"],
				"privileges" => array("insert" => 1, "select" => 1, "update" => 1),
				//! "comment" => $row["Comment"],
				//! "primary" => ($row["Key"] == "PRI"),
			);
		}
		return $return;
	}

	function indexes($table, $connection2 = null) {
		$return = array();
		foreach (get_rows("SELECT uic.*, uc.constraint_type
FROM user_ind_columns uic
LEFT JOIN user_constraints uc ON uic.index_name = uc.constraint_name AND uic.table_name = uc.table_name
WHERE uic.table_name = " . q($table) . "
ORDER BY uc.constraint_type, uic.column_position", $connection2) as $row) {
			$index_name = $row["INDEX_NAME"];
			$return[$index_name]["type"] = ($row["CONSTRAINT_TYPE"] == "P" ? "PRIMARY" : ($row["CONSTRAINT_TYPE"] == "U" ? "UNIQUE" : "INDEX"));
			$return[$index_name]["columns"][] = $row["COLUMN_NAME"];
			$return[$index_name]["lengths"][] = ($row["CHAR_LENGTH"] && $row["CHAR_LENGTH"] != $row["COLUMN_LENGTH"] ? $row["CHAR_LENGTH"] : null);
			$return[$index_name]["descs"][] = ($row["DESCEND"] ? '1' : null);
		}
		return $return;
	}

	function view($name) {
		$rows = get_rows('SELECT text "select" FROM user_views WHERE view_name = ' . q($name));
		return reset($rows);
	}
	
	function collations() {
		return array(); //!
	}

	function information_schema($db) {
		return false;
	}

	function error() {
		global $connection;
		return h($connection->error); //! highlight sqltext from offset
	}
	
	function explain($connection, $query) {
		$connection->query("EXPLAIN PLAN FOR $query");
		return $connection->query("SELECT * FROM plan_table");
	}
	
	function found_rows($table_status, $where) {
	}
	
	function alter_table($table, $name, $fields, $foreign, $comment, $engine, $collation, $auto_increment, $partitioning) {
		$alter = $drop = array();
		foreach ($fields as $field) {
			$val = $field[1];
			if ($val && $field[0] != "" && idf_escape($field[0]) != $val[0]) {
				queries("ALTER TABLE " . table($table) . " RENAME COLUMN " . idf_escape($field[0]) . " TO $val[0]");
			}
			if ($val) {
				$alter[] = ($table != "" ? ($field[0] != "" ? "MODIFY (" : "ADD (") : "  ") . implode($val) . ($table != "" ? ")" : ""); //! error with name change only
			} else {
				$drop[] = idf_escape($field[0]);
			}
		}
		if ($table == "") {
			return queries("CREATE TABLE " . table($name) . " (\n" . implode(",\n", $alter) . "\n)");
		}
		return (!$alter || queries("ALTER TABLE " . table($table) . "\n" . implode("\n", $alter)))
			&& (!$drop || queries("ALTER TABLE " . table($table) . " DROP (" . implode(", ", $drop) . ")"))
			&& ($table == $name || queries("ALTER TABLE " . table($table) . " RENAME TO " . table($name)))
		;
	}
	
	function foreign_keys($table) {
		return array(); //!
	}
	
	function truncate_tables($tables) {
		return apply_queries("TRUNCATE TABLE", $tables);
	}

	function drop_views($views) {
		return apply_queries("DROP VIEW", $views);
	}

	function drop_tables($tables) {
		return apply_queries("DROP TABLE", $tables);
	}

	function begin() {
		return true; // automatic start
	}
	
	function insert_into($table, $set) {
		return queries("INSERT INTO " . table($table) . " (" . implode(", ", array_keys($set)) . ")\nVALUES (" . implode(", ", $set) . ")"); //! no columns
	}
	
	function last_id() {
		return 0; //!
	}
	
	function schemas() {
		return get_vals("SELECT DISTINCT owner FROM dba_segments WHERE owner IN (SELECT username FROM dba_users WHERE default_tablespace NOT IN ('SYSTEM','SYSAUX'))");
	}
	
	function get_schema() {
		global $connection;
		return $connection->result("SELECT sys_context('USERENV', 'SESSION_USER') FROM dual");
	}
	
	function set_schema($scheme) {
		global $connection;
		return $connection->query("ALTER SESSION SET CURRENT_SCHEMA = " . idf_escape($scheme));
	}
	
	function show_variables() {
		return get_key_vals('SELECT name, display_value FROM v$parameter');
	}
	
	function process_list() {
		return get_rows('SELECT sess.process AS "process", sess.username AS "user", sess.schemaname AS "schema", sess.status AS "status", sess.wait_class AS "wait_class", sess.seconds_in_wait AS "seconds_in_wait", sql.sql_text AS "sql_text", sess.machine AS "machine", sess.port AS "port"
FROM v$session sess LEFT OUTER JOIN v$sql sql
ON sql.sql_id = sess.sql_id
WHERE sess.type = \'USER\'
ORDER BY PROCESS
');
	}
	
	function show_status() {
		$rows = get_rows('SELECT * FROM v$instance');
		return reset($rows);
	}
	
	function convert_field($field) {
	}
	
	function unconvert_field($field, $return) {
		return $return;
	}
	
	function support($feature) {
		return ereg("view|scheme|processlist|drop_col|variables|status", $feature); //!
	}
	
	$jush = "oracle";
	$types = array();
	$structured_types = array();
	foreach (array(
		lang(14) => array("number" => 38, "binary_float" => 12, "binary_double" => 21),
		lang(15) => array("date" => 10, "timestamp" => 29, "interval year" => 12, "interval day" => 28), //! year(), day() to second()
		lang(16) => array("char" => 2000, "varchar2" => 4000, "nchar" => 2000, "nvarchar2" => 4000, "clob" => 4294967295, "nclob" => 4294967295),
		lang(17) => array("raw" => 2000, "long raw" => 2147483648, "blob" => 4294967295, "bfile" => 4294967296),
	) as $key => $val) {
		$types += $val;
		$structured_types[$key] = array_keys($val);
	}
	$unsigned = array();
	$operators = array("=", "<", ">", "<=", ">=", "!=", "LIKE", "LIKE %%", "IN", "IS NULL", "NOT LIKE", "NOT REGEXP", "NOT IN", "IS NOT NULL", "SQL");
	$functions = array("length", "lower", "round", "upper");
	$grouping = array("avg", "count", "count distinct", "max", "min", "sum");
	$edit_functions = array(
		array( //! no parentheses
			"date" => "current_date",
			"timestamp" => "current_timestamp",
		), array(
			"number|float|double" => "+/-",
			"date|timestamp" => "+ interval/- interval",
			"char|clob" => "||",
		)
	);
}


/**
* @author Jakub Cernohuby
* @author Vladimir Stastka
* @author Jakub Vrana
*/

$drivers["mssql"] = "MS SQL";

if (isset($_GET["mssql"])) {
	$possible_drivers = array("SQLSRV", "MSSQL");
	define("DRIVER", "mssql");
	if (extension_loaded("sqlsrv")) {
		class Min_DB {
			var $extension = "sqlsrv", $_link, $_result, $server_info, $affected_rows, $errno, $error;

			function _get_error() {
				$this->error = "";
				foreach (sqlsrv_errors() as $error) {
					$this->errno = $error["code"];
					$this->error .= "$error[message]\n";
				}
				$this->error = rtrim($this->error);
			}

			function connect($server, $username, $password) {
				$this->_link = @sqlsrv_connect($server, array("UID" => $username, "PWD" => $password, "CharacterSet" => "UTF-8"));
				if ($this->_link) {
					$info = sqlsrv_server_info($this->_link);
					$this->server_info = $info['SQLServerVersion'];
				} else {
					$this->_get_error();
				}
				return (bool) $this->_link;
			}

			function quote($string) {
				return "'" . str_replace("'", "''", $string) . "'";
			}

			function select_db($database) {
				return $this->query("USE " . idf_escape($database));
			}

			function query($query, $unbuffered = false) {
				$result = sqlsrv_query($this->_link, $query); //! , array(), ($unbuffered ? array() : array("Scrollable" => "keyset"))
				$this->error = "";
				if (!$result) {
					$this->_get_error();
					return false;
				}
				return $this->store_result($result);
			}

			function multi_query($query) {
				$this->_result = sqlsrv_query($this->_link, $query);
				$this->error = "";
				if (!$this->_result) {
					$this->_get_error();
					return false;
				}
				return true;
			}

			function store_result($result = null) {
				if (!$result) {
					$result = $this->_result;
				}
				if (sqlsrv_field_metadata($result)) {
					return new Min_Result($result);
				}
				$this->affected_rows = sqlsrv_rows_affected($result);
				return true;
			}

			function next_result() {
				return sqlsrv_next_result($this->_result);
			}

			function result($query, $field = 0) {
				$result = $this->query($query);
				if (!is_object($result)) {
					return false;
				}
				$row = $result->fetch_row();
				return $row[$field];
			}
		}

		class Min_Result {
			var $_result, $_offset = 0, $_fields, $num_rows;

			function Min_Result($result) {
				$this->_result = $result;
				// $this->num_rows = sqlsrv_num_rows($result); // available only in scrollable results
			}

			function _convert($row) {
				foreach ((array) $row as $key => $val) {
					if (is_a($val, 'DateTime')) {
						$row[$key] = $val->format("Y-m-d H:i:s");
					}
					//! stream
				}
				return $row;
			}
			
			function fetch_assoc() {
				return $this->_convert(sqlsrv_fetch_array($this->_result, SQLSRV_FETCH_ASSOC, SQLSRV_SCROLL_NEXT));
			}

			function fetch_row() {
				return $this->_convert(sqlsrv_fetch_array($this->_result, SQLSRV_FETCH_NUMERIC, SQLSRV_SCROLL_NEXT));
			}

			function fetch_field() {
				if (!$this->_fields) {
					$this->_fields = sqlsrv_field_metadata($this->_result);
				}
				$field = $this->_fields[$this->_offset++];
				$return = new stdClass;
				$return->name = $field["Name"];
				$return->orgname = $field["Name"];
				$return->type = ($field["Type"] == 1 ? 254 : 0);
				return $return;
			}
			
			function seek($offset) {
				for ($i=0; $i < $offset; $i++) {
					sqlsrv_fetch($this->_result); // SQLSRV_SCROLL_ABSOLUTE added in sqlsrv 1.1
				}
			}

			function __destruct() {
				sqlsrv_free_stmt($this->_result);
			}
		}
		
	} elseif (extension_loaded("mssql")) {
		class Min_DB {
			var $extension = "MSSQL", $_link, $_result, $server_info, $affected_rows, $error;

			function connect($server, $username, $password) {
				$this->_link = @mssql_connect($server, $username, $password);
				if ($this->_link) {
					$result = $this->query("SELECT SERVERPROPERTY('ProductLevel'), SERVERPROPERTY('Edition')");
					$row = $result->fetch_row();
					$this->server_info = $this->result("sp_server_info 2", 2) . " [$row[0]] $row[1]";
				} else {
					$this->error = mssql_get_last_message();
				}
				return (bool) $this->_link;
			}

			function quote($string) {
				return "'" . str_replace("'", "''", $string) . "'";
			}

			function select_db($database) {
				return mssql_select_db($database);
			}

			function query($query, $unbuffered = false) {
				$result = mssql_query($query, $this->_link); //! $unbuffered
				$this->error = "";
				if (!$result) {
					$this->error = mssql_get_last_message();
					return false;
				}
				if ($result === true) {
					$this->affected_rows = mssql_rows_affected($this->_link);
					return true;
				}
				return new Min_Result($result);
			}

			function multi_query($query) {
				return $this->_result = $this->query($query);
			}

			function store_result() {
				return $this->_result;
			}

			function next_result() {
				return mssql_next_result($this->_result);
			}

			function result($query, $field = 0) {
				$result = $this->query($query);
				if (!is_object($result)) {
					return false;
				}
				return mssql_result($result->_result, 0, $field);
			}
		}

		class Min_Result {
			var $_result, $_offset = 0, $_fields, $num_rows;

			function Min_Result($result) {
				$this->_result = $result;
				$this->num_rows = mssql_num_rows($result);
			}

			function fetch_assoc() {
				return mssql_fetch_assoc($this->_result);
			}

			function fetch_row() {
				return mssql_fetch_row($this->_result);
			}

			function num_rows() {
				return mssql_num_rows($this->_result);
			}

			function fetch_field() {
				$return = mssql_fetch_field($this->_result);
				$return->orgtable = $return->table;
				$return->orgname = $return->name;
				return $return;
			}

			function seek($offset) {
				mssql_data_seek($this->_result, $offset);
			}
			
			function __destruct() {
				mssql_free_result($this->_result);
			}
		}
		
	}

	function idf_escape($idf) {
		return "[" . str_replace("]", "]]", $idf) . "]";
	}

	function table($idf) {
		return ($_GET["ns"] != "" ? idf_escape($_GET["ns"]) . "." : "") . idf_escape($idf);
	}

	function connect() {
		global $adminer;
		$connection = new Min_DB;
		$credentials = $adminer->credentials();
		if ($connection->connect($credentials[0], $credentials[1], $credentials[2])) {
			return $connection;
		}
		return $connection->error;
	}

	function get_databases() {
		return get_vals("EXEC sp_databases");
	}

	function limit($query, $where, $limit, $offset = 0, $separator = " ") {
		return ($limit !== null ? " TOP (" . ($limit + $offset) . ")" : "") . " $query$where"; // seek later
	}

	function limit1($query, $where) {
		return limit($query, $where, 1);
	}

	function db_collation($db, $collations) {
		global $connection;
		return $connection->result("SELECT collation_name FROM sys.databases WHERE name =  " . q($db));
	}

	function engines() {
		return array();
	}

	function logged_user() {
		global $connection;
		return $connection->result("SELECT SUSER_NAME()");
	}

	function tables_list() {
		return get_key_vals("SELECT name, type_desc FROM sys.all_objects WHERE schema_id = SCHEMA_ID(" . q(get_schema()) . ") AND type IN ('S', 'U', 'V') ORDER BY name");
	}

	function count_tables($databases) {
		global $connection;
		$return = array();
		foreach ($databases as $db) {
			$connection->select_db($db);
			$return[$db] = $connection->result("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES");
		}
		return $return;
	}
	
	function table_status($name = "") {
		$return = array();
		foreach (get_rows("SELECT name AS Name, type_desc AS Engine FROM sys.all_objects WHERE schema_id = SCHEMA_ID(" . q(get_schema()) . ") AND type IN ('S', 'U', 'V') " . ($name != "" ? "AND name = " . q($name) : "ORDER BY name")) as $row) {
			if ($name != "") {
				return $row;
			}
			$return[$row["Name"]] = $row;
		}
		return $return;
	}

	function is_view($table_status) {
		return $table_status["Engine"] == "VIEW";
	}
	
	function fk_support($table_status) {
		return true;
	}

	function fields($table) {
		$return = array();
		foreach (get_rows("SELECT c.*, t.name type, d.definition [default]
FROM sys.all_columns c
JOIN sys.all_objects o ON c.object_id = o.object_id
JOIN sys.types t ON c.user_type_id = t.user_type_id
LEFT JOIN sys.default_constraints d ON c.default_object_id = d.parent_column_id
WHERE o.schema_id = SCHEMA_ID(" . q(get_schema()) . ") AND o.type IN ('S', 'U', 'V') AND o.name = " . q($table)
		) as $row) {
			$type = $row["type"];
			$length = (ereg("char|binary", $type) ? $row["max_length"] : ($type == "decimal" ? "$row[precision],$row[scale]" : ""));
			$return[$row["name"]] = array(
				"field" => $row["name"],
				"full_type" => $type . ($length ? "($length)" : ""),
				"type" => $type,
				"length" => $length,
				"default" => $row["default"],
				"null" => $row["is_nullable"],
				"auto_increment" => $row["is_identity"],
				"collation" => $row["collation_name"],
				"privileges" => array("insert" => 1, "select" => 1, "update" => 1),
				"primary" => $row["is_identity"], //! or indexes.is_primary_key
			);
		}
		return $return;
	}

	function indexes($table, $connection2 = null) {
		$return = array();
		// sp_statistics doesn't return information about primary key
		foreach (get_rows("SELECT i.name, key_ordinal, is_unique, is_primary_key, c.name AS column_name, is_descending_key
FROM sys.indexes i
INNER JOIN sys.index_columns ic ON i.object_id = ic.object_id AND i.index_id = ic.index_id
INNER JOIN sys.columns c ON ic.object_id = c.object_id AND ic.column_id = c.column_id
WHERE OBJECT_NAME(i.object_id) = " . q($table)
		, $connection2) as $row) {
			$name = $row["name"];
			$return[$name]["type"] = ($row["is_primary_key"] ? "PRIMARY" : ($row["is_unique"] ? "UNIQUE" : "INDEX"));
			$return[$name]["lengths"] = array();
			$return[$name]["columns"][$row["key_ordinal"]] = $row["column_name"];
			$return[$name]["descs"][$row["key_ordinal"]] = ($row["is_descending_key"] ? '1' : null);
		}
		return $return;
	}

	function view($name) {
		global $connection;
		return array("select" => preg_replace('~^(?:[^[]|\\[[^]]*])*\\s+AS\\s+~isU', '', $connection->result("SELECT VIEW_DEFINITION FROM INFORMATION_SCHEMA.VIEWS WHERE TABLE_SCHEMA = SCHEMA_NAME() AND TABLE_NAME = " . q($name))));
	}
	
	function collations() {
		$return = array();
		foreach (get_vals("SELECT name FROM fn_helpcollations()") as $collation) {
			$return[ereg_replace("_.*", "", $collation)][] = $collation;
		}
		return $return;
	}

	function information_schema($db) {
		return false;
	}

	function error() {
		global $connection;
		return nl_br(h(preg_replace('~^(\\[[^]]*])+~m', '', $connection->error)));
	}
	
	function create_database($db, $collation) {
		return queries("CREATE DATABASE " . idf_escape($db) . (eregi('^[a-z0-9_]+$', $collation) ? " COLLATE $collation" : ""));
	}
	
	function drop_databases($databases) {
		return queries("DROP DATABASE " . implode(", ", array_map('idf_escape', $databases)));
	}
	
	function rename_database($name, $collation) {
		if (eregi('^[a-z0-9_]+$', $collation)) {
			queries("ALTER DATABASE " . idf_escape(DB) . " COLLATE $collation");
		}
		queries("ALTER DATABASE " . idf_escape(DB) . " MODIFY NAME = " . idf_escape($name));
		return true; //! false negative "The database name 'test2' has been set."
	}

	function auto_increment() {
		return " IDENTITY" . ($_POST["Auto_increment"] != "" ? "(" . (+$_POST["Auto_increment"]) . ",1)" : "") . " PRIMARY KEY";
	}
	
	function alter_table($table, $name, $fields, $foreign, $comment, $engine, $collation, $auto_increment, $partitioning) {
		$alter = array();
		foreach ($fields as $field) {
			$column = idf_escape($field[0]);
			$val = $field[1];
			if (!$val) {
				$alter["DROP"][] = " COLUMN $column";
			} else {
				$val[1] = preg_replace("~( COLLATE )'(\\w+)'~", "\\1\\2", $val[1]);
				if ($field[0] == "") {
					$alter["ADD"][] = "\n  " . implode("", $val) . ($table == "" ? substr($foreign[$val[0]], 16 + strlen($val[0])) : ""); // 16 - strlen("  FOREIGN KEY ()")
				} else {
					unset($val[6]); //! identity can't be removed
					if ($column != $val[0]) {
						queries("EXEC sp_rename " . q(table($table) . ".$column") . ", " . q(idf_unescape($val[0])) . ", 'COLUMN'");
					}
					$alter["ALTER COLUMN " . implode("", $val)][] = "";
				}
			}
		}
		if ($table == "") {
			return queries("CREATE TABLE " . table($name) . " (" . implode(",", (array) $alter["ADD"]) . "\n)");
		}
		if ($table != $name) {
			queries("EXEC sp_rename " . q(table($table)) . ", " . q($name));
		}
		if ($foreign) {
			$alter[""] = $foreign;
		}
		foreach ($alter as $key => $val) {
			if (!queries("ALTER TABLE " . idf_escape($name) . " $key" . implode(",", $val))) {
				return false;
			}
		}
		return true;
	}
	
	function alter_indexes($table, $alter) {
		$index = array();
		$drop = array();
		foreach ($alter as $val) {
			if ($val[2] == "DROP") {
				if ($val[0] == "PRIMARY") { //! sometimes used also for UNIQUE
					$drop[] = idf_escape($val[1]);
				} else {
					$index[] = idf_escape($val[1]) . " ON " . table($table);
				}
			} elseif (!queries(($val[0] != "PRIMARY"
				? "CREATE $val[0] " . ($val[0] != "INDEX" ? "INDEX " : "") . idf_escape($val[1] != "" ? $val[1] : uniqid($table . "_")) . " ON " . table($table)
				: "ALTER TABLE " . table($table) . " ADD PRIMARY KEY"
			) . " $val[2]")) {
				return false;
			}
		}
		return (!$index || queries("DROP INDEX " . implode(", ", $index)))
			&& (!$drop || queries("ALTER TABLE " . table($table) . " DROP " . implode(", ", $drop)))
		;
	}
	
	function begin() {
		return queries("BEGIN TRANSACTION");
	}
	
	function insert_into($table, $set) {
		return queries("INSERT INTO " . table($table) . ($set ? " (" . implode(", ", array_keys($set)) . ")\nVALUES (" . implode(", ", $set) . ")" : "DEFAULT VALUES"));
	}
	
	function insert_update($table, $set, $primary) {
		$update = array();
		$where = array();
		foreach ($set as $key => $val) {
			$update[] = "$key = $val";
			if (isset($primary[idf_unescape($key)])) {
				$where[] = "$key = $val";
			}
		}
		// can use only one query for all rows with different API
		return queries("MERGE " . table($table) . " USING (VALUES(" . implode(", ", $set) . ")) AS source (c" . implode(", c", range(1, count($set))) . ") ON " . implode(" AND ", $where) //! source, c1 - possible conflict
			. " WHEN MATCHED THEN UPDATE SET " . implode(", ", $update)
			. " WHEN NOT MATCHED THEN INSERT (" . implode(", ", array_keys($set)) . ") VALUES (" . implode(", ", $set) . ");" // ; is mandatory
		);
	}
	
	function last_id() {
		global $connection;
		return $connection->result("SELECT SCOPE_IDENTITY()"); // @@IDENTITY can return trigger INSERT
	}
	
	function explain($connection, $query) {
		$connection->query("SET SHOWPLAN_ALL ON");
		$return = $connection->query($query);
		$connection->query("SET SHOWPLAN_ALL OFF"); // connection is used also for indexes
		return $return;
	}
	
	function found_rows($table_status, $where) {
	}
	
	function foreign_keys($table) {
		$return = array();
		foreach (get_rows("EXEC sp_fkeys @fktable_name = " . q($table)) as $row) {
			$foreign_key = &$return[$row["FK_NAME"]];
			$foreign_key["table"] = $row["PKTABLE_NAME"];
			$foreign_key["source"][] = $row["FKCOLUMN_NAME"];
			$foreign_key["target"][] = $row["PKCOLUMN_NAME"];
		}
		return $return;
	}

	function truncate_tables($tables) {
		return apply_queries("TRUNCATE TABLE", $tables);
	}

	function drop_views($views) {
		return queries("DROP VIEW " . implode(", ", array_map('table', $views)));
	}

	function drop_tables($tables) {
		return queries("DROP TABLE " . implode(", ", array_map('table', $tables)));
	}

	function move_tables($tables, $views, $target) {
		return apply_queries("ALTER SCHEMA " . idf_escape($target) . " TRANSFER", array_merge($tables, $views));
	}
	
	function trigger($name) {
		if ($name == "") {
			return array();
		}
		$rows = get_rows("SELECT s.name [Trigger],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(s.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(s.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing],
c.text
FROM sysobjects s
JOIN syscomments c ON s.id = c.id
WHERE s.xtype = 'TR' AND s.name = " . q($name)
		); // triggers are not schema-scoped
		$return = reset($rows);
		if ($return) {
			$return["Statement"] = preg_replace('~^.+\\s+AS\\s+~isU', '', $return["text"]); //! identifiers, comments
		}
		return $return;
	}
	
	function triggers($table) {
		$return = array();
		foreach (get_rows("SELECT sys1.name,
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing]
FROM sysobjects sys1
JOIN sysobjects sys2 ON sys1.parent_obj = sys2.id
WHERE sys1.xtype = 'TR' AND sys2.name = " . q($table)
		) as $row) { // triggers are not schema-scoped
			$return[$row["name"]] = array($row["Timing"], $row["Event"]);
		}
		return $return;
	}
	
	function trigger_options() {
		return array(
			"Timing" => array("AFTER", "INSTEAD OF"),
			"Type" => array("AS"),
		);
	}
	
	function schemas() {
		return get_vals("SELECT name FROM sys.schemas");
	}
	
	function get_schema() {
		global $connection;
		if ($_GET["ns"] != "") {
			return $_GET["ns"];
		}
		return $connection->result("SELECT SCHEMA_NAME()");
	}
	
	function set_schema($schema) {
		return true; // ALTER USER is permanent
	}
	
	function use_sql($database) {
		return "USE " . idf_escape($database);
	}
	
	function show_variables() {
		return array();
	}
	
	function show_status() {
		return array();
	}

	function convert_field($field) {
	}
	
	function unconvert_field($field, $return) {
		return $return;
	}
	
	function support($feature) {
		return ereg('^(scheme|trigger|view|drop_col)$', $feature); //! routine|
	}
	
	$jush = "mssql";
	$types = array();
	$structured_types = array();
	foreach (array( //! use sys.types
		lang(14) => array("tinyint" => 3, "smallint" => 5, "int" => 10, "bigint" => 20, "bit" => 1, "decimal" => 0, "real" => 12, "float" => 53, "smallmoney" => 10, "money" => 20),
		lang(15) => array("date" => 10, "smalldatetime" => 19, "datetime" => 19, "datetime2" => 19, "time" => 8, "datetimeoffset" => 10),
		lang(16) => array("char" => 8000, "varchar" => 8000, "text" => 2147483647, "nchar" => 4000, "nvarchar" => 4000, "ntext" => 1073741823),
		lang(17) => array("binary" => 8000, "varbinary" => 8000, "image" => 2147483647),
	) as $key => $val) {
		$types += $val;
		$structured_types[$key] = array_keys($val);
	}
	$unsigned = array();
	$operators = array("=", "<", ">", "<=", ">=", "!=", "LIKE", "LIKE %%", "IN", "IS NULL", "NOT LIKE", "NOT IN", "IS NOT NULL");
	$functions = array("len", "lower", "round", "upper");
	$grouping = array("avg", "count", "count distinct", "max", "min", "sum");
	$edit_functions = array(
		array(
			"date|time" => "getdate",
		), array(
			"int|decimal|real|float|money|datetime" => "+/-",
			"char|text" => "+",
		)
	);
}


$drivers = array("server" => "MySQL") + $drivers;

if (!defined("DRIVER")) {
	$possible_drivers = array("MySQLi", "MySQL", "PDO_MySQL");
	define("DRIVER", "server"); // server - backwards compatibility
	// MySQLi supports everything, MySQL doesn't support multiple result sets, PDO_MySQL doesn't support orgtable
	if (extension_loaded("mysqli")) {
		class Min_DB extends MySQLi {
			var $extension = "MySQLi";
			
			function Min_DB() {
				parent::init();
			}
			
			function connect($server, $username, $password) {
				mysqli_report(MYSQLI_REPORT_OFF); // stays between requests, not required since PHP 5.3.4
				list($host, $port) = explode(":", $server, 2); // part after : is used for port or socket
				$return = @$this->real_connect(
					($server != "" ? $host : ini_get("mysqli.default_host")),
					($server . $username != "" ? $username : ini_get("mysqli.default_user")),
					($server . $username . $password != "" ? $password : ini_get("mysqli.default_pw")),
					null,
					(is_numeric($port) ? $port : ini_get("mysqli.default_port")),
					(!is_numeric($port) ? $port : null)
				);
				if ($return) {
					if (method_exists($this, 'set_charset')) {
						$this->set_charset("utf8");
					} else {
						$this->query("SET NAMES utf8");
					}
				}
				return $return;
			}
			
			function result($query, $field = 0) {
				$result = $this->query($query);
				if (!$result) {
					return false;
				}
				$row = $result->fetch_array();
				return $row[$field];
			}
			
			function quote($string) {
				return "'" . $this->escape_string($string) . "'";
			}
		}
		
	} elseif (extension_loaded("mysql") && !(ini_get("sql.safe_mode") && extension_loaded("pdo_mysql"))) {
		class Min_DB {
			var
				$extension = "MySQL", ///< @var string extension name
				$server_info, ///< @var string server version
				$affected_rows, ///< @var int number of affected rows
				$errno, ///< @var int last error code
				$error, ///< @var string last error message
				$_link, $_result ///< @access private
			;
			
			/** Connect to server
			* @param string
			* @param string
			* @param string
			* @return bool
			*/
			function connect($server, $username, $password) {
				$this->_link = @mysql_connect(
					($server != "" ? $server : ini_get("mysql.default_host")),
					("$server$username" != "" ? $username : ini_get("mysql.default_user")),
					("$server$username$password" != "" ? $password : ini_get("mysql.default_password")),
					true,
					131072 // CLIENT_MULTI_RESULTS for CALL
				);
				if ($this->_link) {
					$this->server_info = mysql_get_server_info($this->_link);
					if (function_exists('mysql_set_charset')) {
						mysql_set_charset("utf8", $this->_link);
					} else {
						$this->query("SET NAMES utf8");
					}
				} else {
					$this->error = mysql_error();
				}
				return (bool) $this->_link;
			}
			
			/** Quote string to use in SQL
			* @param string
			* @return string escaped string enclosed in '
			*/
			function quote($string) {
				return "'" . mysql_real_escape_string($string, $this->_link) . "'";
			}
			
			/** Select database
			* @param string
			* @return bool
			*/
			function select_db($database) {
				return mysql_select_db($database, $this->_link);
			}
			
			/** Send query
			* @param string
			* @param bool
			* @return mixed bool or Min_Result
			*/
			function query($query, $unbuffered = false) {
				$result = @($unbuffered ? mysql_unbuffered_query($query, $this->_link) : mysql_query($query, $this->_link)); // @ - mute mysql.trace_mode
				$this->error = "";
				if (!$result) {
					$this->errno = mysql_errno($this->_link);
					$this->error = mysql_error($this->_link);
					return false;
				}
				if ($result === true) {
					$this->affected_rows = mysql_affected_rows($this->_link);
					$this->info = mysql_info($this->_link);
					return true;
				}
				return new Min_Result($result);
			}
			
			/** Send query with more resultsets
			* @param string
			* @return bool
			*/
			function multi_query($query) {
				return $this->_result = $this->query($query);
			}
			
			/** Get current resultset
			* @return Min_Result
			*/
			function store_result() {
				return $this->_result;
			}
			
			/** Fetch next resultset
			* @return bool
			*/
			function next_result() {
				// MySQL extension doesn't support multiple results
				return false;
			}
			
			/** Get single field from result
			* @param string
			* @param int
			* @return string
			*/
			function result($query, $field = 0) {
				$result = $this->query($query);
				if (!$result || !$result->num_rows) {
					return false;
				}
				return mysql_result($result->_result, 0, $field);
			}
		}
		
		class Min_Result {
			var
				$num_rows, ///< @var int number of rows in the result
				$_result, $_offset = 0 ///< @access private
			;
			
			/** Constructor
			* @param resource
			*/
			function Min_Result($result) {
				$this->_result = $result;
				$this->num_rows = mysql_num_rows($result);
			}
			
			/** Fetch next row as associative array
			* @return array
			*/
			function fetch_assoc() {
				return mysql_fetch_assoc($this->_result);
			}
			
			/** Fetch next row as numbered array
			* @return array
			*/
			function fetch_row() {
				return mysql_fetch_row($this->_result);
			}
			
			/** Fetch next field
			* @return object properties: name, type, orgtable, orgname, charsetnr
			*/
			function fetch_field() {
				$return = mysql_fetch_field($this->_result, $this->_offset++); // offset required under certain conditions
				$return->orgtable = $return->table;
				$return->orgname = $return->name;
				$return->charsetnr = ($return->blob ? 63 : 0);
				return $return;
			}
			
			/** Free result set
			*/
			function __destruct() {
				mysql_free_result($this->_result); //! not called in PHP 4 which is a problem with mysql.trace_mode
			}
		}
		
	} elseif (extension_loaded("pdo_mysql")) {
		class Min_DB extends Min_PDO {
			var $extension = "PDO_MySQL";
			
			function connect($server, $username, $password) {
				$this->dsn("mysql:host=" . str_replace(":", ";unix_socket=", preg_replace('~:(\\d)~', ';port=\\1', $server)), $username, $password);
				$this->query("SET NAMES utf8"); // charset in DSN is ignored
				return true;
			}
			
			function select_db($database) {
				// database selection is separated from the connection so dbname in DSN can't be used
				return $this->query("USE " . idf_escape($database));
			}
			
			function query($query, $unbuffered = false) {
				$this->setAttribute(1000, !$unbuffered); // 1000 - PDO::MYSQL_ATTR_USE_BUFFERED_QUERY
				return parent::query($query, $unbuffered);
			}
		}
		
	}

	/** Escape database identifier
	* @param string
	* @return string
	*/
	function idf_escape($idf) {
		return "`" . str_replace("`", "``", $idf) . "`";
	}

	/** Get escaped table name
	* @param string
	* @return string
	*/
	function table($idf) {
		return idf_escape($idf);
	}

	/** Connect to the database
	* @return mixed Min_DB or string for error
	*/
	function connect() {
		global $adminer;
		$connection = new Min_DB;
		$credentials = $adminer->credentials();
		if ($connection->connect($credentials[0], $credentials[1], $credentials[2])) {
			$connection->query("SET sql_quote_show_create = 1, autocommit = 1");
			return $connection;
		}
		$return = $connection->error;
		if (function_exists('iconv') && !is_utf8($return) && strlen($s = iconv("windows-1250", "utf-8", $return)) > strlen($return)) { // windows-1250 - most common Windows encoding
			$return = $s;
		}
		return $return;
	}

	/** Get cached list of databases
	* @param bool
	* @return array
	*/
	function get_databases($flush) {
		global $connection;
		// SHOW DATABASES can take a very long time so it is cached
		$return = get_session("dbs");
		if ($return === null) {
			$query = ($connection->server_info >= 5
				? "SELECT SCHEMA_NAME FROM information_schema.SCHEMATA"
				: "SHOW DATABASES"
			); // SHOW DATABASES can be disabled by skip_show_database
			$return = ($flush ? slow_query($query) : get_vals($query));
			restart_session();
			set_session("dbs", $return);
			stop_session();
		}
		return $return;
	}

	/** Formulate SQL query with limit
	* @param string everything after SELECT
	* @param string including WHERE
	* @param int
	* @param int
	* @param string
	* @return string
	*/
	function limit($query, $where, $limit, $offset = 0, $separator = " ") {
		return " $query$where" . ($limit !== null ? $separator . "LIMIT $limit" . ($offset ? " OFFSET $offset" : "") : "");
	}

	/** Formulate SQL modification query with limit 1
	* @param string everything after UPDATE or DELETE
	* @param string
	* @return string
	*/
	function limit1($query, $where) {
		return limit($query, $where, 1);
	}

	/** Get database collation
	* @param string
	* @param array result of collations()
	* @return string
	*/
	function db_collation($db, $collations) {
		global $connection;
		$return = null;
		$create = $connection->result("SHOW CREATE DATABASE " . idf_escape($db), 1);
		if (preg_match('~ COLLATE ([^ ]+)~', $create, $match)) {
			$return = $match[1];
		} elseif (preg_match('~ CHARACTER SET ([^ ]+)~', $create, $match)) {
			// default collation
			$return = $collations[$match[1]][-1];
		}
		return $return;
	}

	/** Get supported engines
	* @return array
	*/
	function engines() {
		$return = array();
		foreach (get_rows("SHOW ENGINES") as $row) {
			if (ereg("YES|DEFAULT", $row["Support"])) {
				$return[] = $row["Engine"];
			}
		}
		return $return;
	}

	/** Get logged user
	* @return string
	*/
	function logged_user() {
		global $connection;
		return $connection->result("SELECT USER()");
	}

	/** Get tables list
	* @return array array($name => $type)
	*/
	function tables_list() {
		global $connection;
		return get_key_vals("SHOW" . ($connection->server_info >= 5 ? " FULL" : "") . " TABLES");
	}

	/** Count tables in all databases
	* @param array
	* @return array array($db => $tables)
	*/
	function count_tables($databases) {
		$return = array();
		foreach ($databases as $db) {
			$return[$db] = count(get_vals("SHOW TABLES IN " . idf_escape($db)));
		}
		return $return;
	}

	/** Get table status
	* @param string
	* @param bool return only "Name", "Engine" and "Comment" fields
	* @return array array($name => array("Name" => , "Engine" => , "Comment" => , "Oid" => , "Rows" => , "Collation" => , "Auto_increment" => , "Data_length" => , "Index_length" => , "Data_free" => )) or only inner array with $name
	*/
	function table_status($name = "", $fast = false) {
		global $connection;
		$return = array();
		foreach (get_rows($fast && $connection->server_info >= 5
			? "SELECT TABLE_NAME AS Name, Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() " . ($name != "" ? "AND TABLE_NAME = " . q($name) : "ORDER BY Name")
			: "SHOW TABLE STATUS" . ($name != "" ? " LIKE " . q(addcslashes($name, "%_\\")) : "")
		) as $row) {
			if ($row["Engine"] == "InnoDB") {
				// ignore internal comment, unnecessary since MySQL 5.1.21
				$row["Comment"] = preg_replace('~(?:(.+); )?InnoDB free: .*~', '\\1', $row["Comment"]);
			}
			if (!isset($row["Engine"])) {
				$row["Comment"] = "";
			}
			if ($name != "") {
				return $row;
			}
			$return[$row["Name"]] = $row;
		}
		return $return;
	}

	/** Find out whether the identifier is view
	* @param array
	* @return bool
	*/
	function is_view($table_status) {
		return $table_status["Engine"] === null;
	}

	/** Check if table supports foreign keys
	* @param array result of table_status
	* @return bool
	*/
	function fk_support($table_status) {
		return eregi("InnoDB|IBMDB2I", $table_status["Engine"]);
	}

	/** Get information about fields
	* @param string
	* @return array array($name => array("field" => , "full_type" => , "type" => , "length" => , "unsigned" => , "default" => , "null" => , "auto_increment" => , "on_update" => , "collation" => , "privileges" => , "comment" => , "primary" => ))
	*/
	function fields($table) {
		$return = array();
		foreach (get_rows("SHOW FULL COLUMNS FROM " . table($table)) as $row) {
			preg_match('~^([^( ]+)(?:\\((.+)\\))?( unsigned)?( zerofill)?$~', $row["Type"], $match);
			$return[$row["Field"]] = array(
				"field" => $row["Field"],
				"full_type" => $row["Type"],
				"type" => $match[1],
				"length" => $match[2],
				"unsigned" => ltrim($match[3] . $match[4]),
				"default" => ($row["Default"] != "" || ereg("char|set", $match[1]) ? $row["Default"] : null),
				"null" => ($row["Null"] == "YES"),
				"auto_increment" => ($row["Extra"] == "auto_increment"),
				"on_update" => (eregi('^on update (.+)', $row["Extra"], $match) ? $match[1] : ""), //! available since MySQL 5.1.23
				"collation" => $row["Collation"],
				"privileges" => array_flip(explode(",", $row["Privileges"])),
				"comment" => $row["Comment"],
				"primary" => ($row["Key"] == "PRI"),
			);
		}
		return $return;
	}

	/** Get table indexes
	* @param string
	* @param string Min_DB to use
	* @return array array($key_name => array("type" => , "columns" => array(), "lengths" => array()))
	*/
	function indexes($table, $connection2 = null) {
		$return = array();
		foreach (get_rows("SHOW INDEX FROM " . table($table), $connection2) as $row) {
			$return[$row["Key_name"]]["type"] = ($row["Key_name"] == "PRIMARY" ? "PRIMARY" : ($row["Index_type"] == "FULLTEXT" ? "FULLTEXT" : ($row["Non_unique"] ? "INDEX" : "UNIQUE")));
			$return[$row["Key_name"]]["columns"][] = $row["Column_name"];
			$return[$row["Key_name"]]["lengths"][] = $row["Sub_part"];
			$return[$row["Key_name"]]["descs"][] = null;
		}
		return $return;
	}

	/** Get foreign keys in table
	* @param string
	* @return array array($name => array("db" => , "ns" => , "table" => , "source" => array(), "target" => array(), "on_delete" => , "on_update" => ))
	*/
	function foreign_keys($table) {
		global $connection, $on_actions;
		static $pattern = '`(?:[^`]|``)+`';
		$return = array();
		$create_table = $connection->result("SHOW CREATE TABLE " . table($table), 1);
		if ($create_table) {
			preg_match_all("~CONSTRAINT ($pattern) FOREIGN KEY \\(((?:$pattern,? ?)+)\\) REFERENCES ($pattern)(?:\\.($pattern))? \\(((?:$pattern,? ?)+)\\)(?: ON DELETE ($on_actions))?(?: ON UPDATE ($on_actions))?~", $create_table, $matches, PREG_SET_ORDER);
			foreach ($matches as $match) {
				preg_match_all("~$pattern~", $match[2], $source);
				preg_match_all("~$pattern~", $match[5], $target);
				$return[idf_unescape($match[1])] = array(
					"db" => idf_unescape($match[4] != "" ? $match[3] : $match[4]),
					"table" => idf_unescape($match[4] != "" ? $match[4] : $match[3]),
					"source" => array_map('idf_unescape', $source[0]),
					"target" => array_map('idf_unescape', $target[0]),
					"on_delete" => ($match[6] ? $match[6] : "RESTRICT"),
					"on_update" => ($match[7] ? $match[7] : "RESTRICT"),
				);
			}
		}
		return $return;
	}

	/** Get view SELECT
	* @param string
	* @return array array("select" => )
	*/
	function view($name) {
		global $connection;
		return array("select" => preg_replace('~^(?:[^`]|`[^`]*`)*\\s+AS\\s+~isU', '', $connection->result("SHOW CREATE VIEW " . table($name), 1)));
	}

	/** Get sorted grouped list of collations
	* @return array
	*/
	function collations() {
		$return = array();
		foreach (get_rows("SHOW COLLATION") as $row) {
			if ($row["Default"]) {
				$return[$row["Charset"]][-1] = $row["Collation"];
			} else {
				$return[$row["Charset"]][] = $row["Collation"];
			}
		}
		ksort($return);
		foreach ($return as $key => $val) {
			asort($return[$key]);
		}
		return $return;
	}

	/** Find out if database is information_schema
	* @param string
	* @return bool
	*/
	function information_schema($db) {
		global $connection;
		return ($connection->server_info >= 5 && $db == "information_schema")
			|| ($connection->server_info >= 5.5 && $db == "performance_schema");
	}

	/** Get escaped error message
	* @return string
	*/
	function error() {
		global $connection;
		return h(preg_replace('~^You have an error.*syntax to use~U', "Syntax error", $connection->error));
	}

	/** Get line of error
	* @return int 0 for first line
	*/
	function error_line() {
		global $connection;
		if (ereg(' at line ([0-9]+)$', $connection->error, $regs)) {
			return $regs[1] - 1;
		}
	}

	/** Create database
	* @param string
	* @param string
	* @return string
	*/
	function create_database($db, $collation) {
		set_session("dbs", null);
		return queries("CREATE DATABASE " . idf_escape($db) . ($collation ? " COLLATE " . q($collation) : ""));
	}
	
	/** Drop databases
	* @param array
	* @return bool
	*/
	function drop_databases($databases) {
		restart_session();
		set_session("dbs", null);
		return apply_queries("DROP DATABASE", $databases, 'idf_escape');
	}
	
	/** Rename database from DB
	* @param string new name
	* @param string
	* @return bool
	*/
	function rename_database($name, $collation) {
		if (create_database($name, $collation)) {
			//! move triggers
			$rename = array();
			foreach (tables_list() as $table => $type) {
				$rename[] = table($table) . " TO " . idf_escape($name) . "." . table($table);
			}
			if (!$rename || queries("RENAME TABLE " . implode(", ", $rename))) {
				queries("DROP DATABASE " . idf_escape(DB));
				return true;
			}
		}
		return false;
	}
	
	/** Generate modifier for auto increment column
	* @return string
	*/
	function auto_increment() {
		$auto_increment_index = " PRIMARY KEY";
		// don't overwrite primary key by auto_increment
		if ($_GET["create"] != "" && $_POST["auto_increment_col"]) {
			foreach (indexes($_GET["create"]) as $index) {
				if (in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"], $index["columns"], true)) {
					$auto_increment_index = "";
					break;
				}
				if ($index["type"] == "PRIMARY") {
					$auto_increment_index = " UNIQUE";
				}
			}
		}
		return " AUTO_INCREMENT$auto_increment_index";
	}
	
	/** Run commands to create or alter table
	* @param string "" to create
	* @param string new name
	* @param array of array($orig, $process_field, $after)
	* @param array of strings
	* @param string
	* @param string
	* @param string
	* @param int
	* @param string
	* @return bool
	*/
	function alter_table($table, $name, $fields, $foreign, $comment, $engine, $collation, $auto_increment, $partitioning) {
		$alter = array();
		foreach ($fields as $field) {
			$alter[] = ($field[1]
				? ($table != "" ? ($field[0] != "" ? "CHANGE " . idf_escape($field[0]) : "ADD") : " ") . " " . implode($field[1]) . ($table != "" ? $field[2] : "")
				: "DROP " . idf_escape($field[0])
			);
		}
		$alter = array_merge($alter, $foreign);
		$status = "COMMENT=" . q($comment)
			. ($engine ? " ENGINE=" . q($engine) : "")
			. ($collation ? " COLLATE " . q($collation) : "")
			. ($auto_increment != "" ? " AUTO_INCREMENT=$auto_increment" : "")
			. $partitioning
		;
		if ($table == "") {
			return queries("CREATE TABLE " . table($name) . " (\n" . implode(",\n", $alter) . "\n) $status");
		}
		if ($table != $name) {
			$alter[] = "RENAME TO " . table($name);
		}
		$alter[] = $status;
		return queries("ALTER TABLE " . table($table) . "\n" . implode(",\n", $alter));
	}
	
	/** Run commands to alter indexes
	* @param string escaped table name
	* @param array of array("index type", "name", "(columns definition)") or array("index type", "name", "DROP")
	* @return bool
	*/
	function alter_indexes($table, $alter) {
		foreach ($alter as $key => $val) {
			$alter[$key] = ($val[2] == "DROP"
				? "\nDROP INDEX " . idf_escape($val[1])
				: "\nADD $val[0] " . ($val[0] == "PRIMARY" ? "KEY " : "") . ($val[1] != "" ? idf_escape($val[1]) . " " : "") . $val[2]
			);
		}
		return queries("ALTER TABLE " . table($table) . implode(",", $alter));
	}
	
	/** Run commands to truncate tables
	* @param array
	* @return bool
	*/
	function truncate_tables($tables) {
		return apply_queries("TRUNCATE TABLE", $tables);
	}
	
	/** Drop views
	* @param array
	* @return bool
	*/
	function drop_views($views) {
		return queries("DROP VIEW " . implode(", ", array_map('table', $views)));
	}
	
	/** Drop tables
	* @param array
	* @return bool
	*/
	function drop_tables($tables) {
		return queries("DROP TABLE " . implode(", ", array_map('table', $tables)));
	}
	
	/** Move tables to other schema
	* @param array
	* @param array
	* @param string
	* @return bool
	*/
	function move_tables($tables, $views, $target) {
		$rename = array();
		foreach (array_merge($tables, $views) as $table) { // views will report SQL error
			$rename[] = table($table) . " TO " . idf_escape($target) . "." . table($table);
		}
		return queries("RENAME TABLE " . implode(", ", $rename));
		//! move triggers
	}
	
	/** Copy tables to other schema
	* @param array
	* @param array
	* @param string
	* @return bool
	*/
	function copy_tables($tables, $views, $target) {
		queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");
		foreach ($tables as $table) {
			$name = ($target == DB ? table("copy_$table") : idf_escape($target) . "." . table($table));
			if (!queries("DROP TABLE IF EXISTS $name")
				|| !queries("CREATE TABLE $name LIKE " . table($table))
				|| !queries("INSERT INTO $name SELECT * FROM " . table($table))
			) {
				return false;
			}
		}
		foreach ($views as $table) {
			$name = ($target == DB ? table("copy_$table") : idf_escape($target) . "." . table($table));
			$view = view($table);
			if (!queries("DROP VIEW IF EXISTS $name")
				|| !queries("CREATE VIEW $name AS $view[select]") //! USE to avoid db.table
			) {
				return false;
			}
		}
		return true;
	}
	
	/** Get information about trigger
	* @param string trigger name
	* @return array array("Trigger" => , "Timing" => , "Event" => , "Type" => , "Statement" => )
	*/
	function trigger($name) {
		if ($name == "") {
			return array();
		}
		$rows = get_rows("SHOW TRIGGERS WHERE `Trigger` = " . q($name));
		return reset($rows);
	}
	
	/** Get defined triggers
	* @param string
	* @return array array($name => array($timing, $event))
	*/
	function triggers($table) {
		$return = array();
		foreach (get_rows("SHOW TRIGGERS LIKE " . q(addcslashes($table, "%_\\"))) as $row) {
			$return[$row["Trigger"]] = array($row["Timing"], $row["Event"]);
		}
		return $return;
	}
	
	/** Get trigger options
	* @return array ("Timing" => array(), "Type" => array())
	*/
	function trigger_options() {
		return array(
			"Timing" => array("BEFORE", "AFTER"),
			// Event is always INSERT, UPDATE, DELETE
			"Type" => array("FOR EACH ROW"),
		);
	}
	
	/** Get information about stored routine
	* @param string
	* @param string "FUNCTION" or "PROCEDURE"
	* @return array ("fields" => array("field" => , "type" => , "length" => , "unsigned" => , "inout" => , "collation" => ), "returns" => , "definition" => , "language" => )
	*/
	function routine($name, $type) {
		global $connection, $enum_length, $inout, $types;
		$aliases = array("bool", "boolean", "integer", "double precision", "real", "dec", "numeric", "fixed", "national char", "national varchar");
		$type_pattern = "((" . implode("|", array_merge(array_keys($types), $aliases)) . ")\\b(?:\\s*\\(((?:[^'\")]*|$enum_length)+)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s]+)['\"]?)?";
		$pattern = "\\s*(" . ($type == "FUNCTION" ? "" : $inout) . ")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$type_pattern";
		$create = $connection->result("SHOW CREATE $type " . idf_escape($name), 2);
		preg_match("~\\(((?:$pattern\\s*,?)*)\\)\\s*" . ($type == "FUNCTION" ? "RETURNS\\s+$type_pattern\\s+" : "") . "(.*)~is", $create, $match);
		$fields = array();
		preg_match_all("~$pattern\\s*,?~is", $match[1], $matches, PREG_SET_ORDER);
		foreach ($matches as $param) {
			$name = str_replace("``", "`", $param[2]) . $param[3];
			$fields[] = array(
				"field" => $name,
				"type" => strtolower($param[5]),
				"length" => preg_replace_callback("~$enum_length~s", 'normalize_enum', $param[6]),
				"unsigned" => strtolower(preg_replace('~\\s+~', ' ', trim("$param[8] $param[7]"))),
				"null" => 1,
				"full_type" => $param[4],
				"inout" => strtoupper($param[1]),
				"collation" => strtolower($param[9]),
			);
		}
		if ($type != "FUNCTION") {
			return array("fields" => $fields, "definition" => $match[11]);
		}
		return array(
			"fields" => $fields,
			"returns" => array("type" => $match[12], "length" => $match[13], "unsigned" => $match[15], "collation" => $match[16]),
			"definition" => $match[17],
			"language" => "SQL", // available in information_schema.ROUTINES.PARAMETER_STYLE
		);
	}
	
	/** Get list of routines
	* @return array ("ROUTINE_TYPE" => , "ROUTINE_NAME" => , "DTD_IDENTIFIER" => )
	*/
	function routines() {
		return get_rows("SELECT ROUTINE_NAME, ROUTINE_TYPE, DTD_IDENTIFIER FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = " . q(DB));
	}
	
	/** Get list of available routine languages
	* @return array
	*/
	function routine_languages() {
		return array(); // "SQL" not required
	}
	
	/** Begin transaction
	* @return bool
	*/
	function begin() {
		return queries("BEGIN");
	}
	
	/** Insert data into table
	* @param string
	* @param array
	* @return bool
	*/
	function insert_into($table, $set) {
		return queries("INSERT INTO " . table($table) . " (" . implode(", ", array_keys($set)) . ")\nVALUES (" . implode(", ", $set) . ")");
	}
	
	/** Insert or update data in the table
	* @param string
	* @param array
	* @param array columns in keys
	* @return bool
	*/
	function insert_update($table, $set, $primary) {
		foreach ($set as $key => $val) {
			$set[$key] = "$key = $val";
		}
		$update = implode(", ", $set);
		return queries("INSERT INTO " . table($table) . " SET $update ON DUPLICATE KEY UPDATE $update");
	}
	
	/** Get last auto increment ID
	* @return string
	*/
	function last_id() {
		global $connection;
		return $connection->result("SELECT LAST_INSERT_ID()"); // mysql_insert_id() truncates bigint
	}
	
	/** Explain select
	* @param Min_DB
	* @param string
	* @return Min_Result
	*/
	function explain($connection, $query) {
		return $connection->query("EXPLAIN " . ($connection->server_info >= 5.1 ? "PARTITIONS " : "") . $query);
	}
	
	/** Get approximate number of rows
	* @param array
	* @param array
	* @return int or null if approximate number can't be retrieved
	*/
	function found_rows($table_status, $where) {
		return ($where || $table_status["Engine"] != "InnoDB" ? null : $table_status["Rows"]);
	}
	
	/** Get user defined types
	* @return array
	*/
	function types() {
		return array();
	}
	
	/** Get existing schemas
	* @return array
	*/
	function schemas() {
		return array();
	}
	
	/** Get current schema
	* @return string
	*/
	function get_schema() {
		return "";
	}
	
	/** Set current schema
	* @param string
	* @return bool
	*/
	function set_schema($schema) {
		return true;
	}
	
	/** Get SQL command to create table
	* @param string
	* @param bool
	* @return string
	*/
	function create_sql($table, $auto_increment) {
		global $connection;
		$return = $connection->result("SHOW CREATE TABLE " . table($table), 1);
		if (!$auto_increment) {
			$return = preg_replace('~ AUTO_INCREMENT=\\d+~', '', $return); //! skip comments
		}
		return $return;
	}
	
	/** Get SQL command to truncate table
	* @param string
	* @return string
	*/
	function truncate_sql($table) {
		return "TRUNCATE " . table($table);
	}
	
	/** Get SQL command to change database
	* @param string
	* @return string
	*/
	function use_sql($database) {
		return "USE " . idf_escape($database);
	}
	
	/** Get SQL commands to create triggers
	* @param string
	* @param string
	* @return string
	*/
	function trigger_sql($table, $style) {
		$return = "";
		foreach (get_rows("SHOW TRIGGERS LIKE " . q(addcslashes($table, "%_\\")), null, "-- ") as $row) {
			$return .= "\n" . ($style == 'CREATE+ALTER' ? "DROP TRIGGER IF EXISTS " . idf_escape($row["Trigger"]) . ";;\n" : "")
			. "CREATE TRIGGER " . idf_escape($row["Trigger"]) . " $row[Timing] $row[Event] ON " . table($row["Table"]) . " FOR EACH ROW\n$row[Statement];;\n";
		}
		return $return;
	}
	
	/** Get server variables
	* @return array ($name => $value)
	*/
	function show_variables() {
		return get_key_vals("SHOW VARIABLES");
	}
	
	/** Get process list
	* @return array ($row)
	*/
	function process_list() {
		return get_rows("SHOW FULL PROCESSLIST");
	}
	
	/** Get status variables
	* @return array ($name => $value)
	*/
	function show_status() {
		return get_key_vals("SHOW STATUS");
	}
	
	/** Convert field in select and edit
	* @param array one element from fields()
	* @return string
	*/
	function convert_field($field) {
		if (ereg("binary", $field["type"])) {
			return "HEX(" . idf_escape($field["field"]) . ")";
		}
		if ($field["type"] == "bit") {
			return "BIN(" . idf_escape($field["field"]) . " + 0)"; // + 0 is required outside MySQLnd
		}
		if (ereg("geometry|point|linestring|polygon", $field["type"])) {
			return "AsWKT(" . idf_escape($field["field"]) . ")";
		}
	}
	
	/** Convert value in edit after applying functions back
	* @param array one element from fields()
	* @param string
	* @return string
	*/
	function unconvert_field($field, $return) {
		if (ereg("binary", $field["type"])) {
			$return = "UNHEX($return)";
		}
		if ($field["type"] == "bit") {
			$return = "CONV($return, 2, 10) + 0";
		}
		if (ereg("geometry|point|linestring|polygon", $field["type"])) {
			$return = "GeomFromText($return)";
		}
		return $return;
	}
	
	/** Check whether a feature is supported
	* @param string "comment", "copy", "drop_col", "dump", "event", "kill", "partitioning", "privileges", "procedure", "processlist", "routine", "scheme", "sequence", "status", "trigger", "type", "variables", "view"
	* @return bool
	*/
	function support($feature) {
		global $connection;
		return !ereg("scheme|sequence|type" . ($connection->server_info < 5.1 ? "|event|partitioning" . ($connection->server_info < 5 ? "|view|routine|trigger" : "") : ""), $feature);
	}

	$jush = "sql"; ///< @var string JUSH identifier
	$types = array(); ///< @var array ($type => $maximum_unsigned_length, ...)
	$structured_types = array(); ///< @var array ($description => array($type, ...), ...)
	foreach (array(
		lang(14) => array("tinyint" => 3, "smallint" => 5, "mediumint" => 8, "int" => 10, "bigint" => 20, "decimal" => 66, "float" => 12, "double" => 21),
		lang(15) => array("date" => 10, "datetime" => 19, "timestamp" => 19, "time" => 10, "year" => 4),
		lang(16) => array("char" => 255, "varchar" => 65535, "tinytext" => 255, "text" => 65535, "mediumtext" => 16777215, "longtext" => 4294967295),
		lang(20) => array("enum" => 65535, "set" => 64),
		lang(17) => array("bit" => 20, "binary" => 255, "varbinary" => 65535, "tinyblob" => 255, "blob" => 65535, "mediumblob" => 16777215, "longblob" => 4294967295),
		lang(19) => array("geometry" => 0, "point" => 0, "linestring" => 0, "polygon" => 0, "multipoint" => 0, "multilinestring" => 0, "multipolygon" => 0, "geometrycollection" => 0),
	) as $key => $val) {
		$types += $val;
		$structured_types[$key] = array_keys($val);
	}
	$unsigned = array("unsigned", "zerofill", "unsigned zerofill"); ///< @var array number variants
	$operators = array("=", "<", ">", "<=", ">=", "!=", "LIKE", "LIKE %%", "REGEXP", "IN", "IS NULL", "NOT LIKE", "NOT REGEXP", "NOT IN", "IS NOT NULL", "SQL"); ///< @var array operators used in select
	$functions = array("char_length", "date", "from_unixtime", "lower", "round", "sec_to_time", "time_to_sec", "upper"); ///< @var array functions used in select
	$grouping = array("avg", "count", "count distinct", "group_concat", "max", "min", "sum"); ///< @var array grouping functions used in select
	$edit_functions = array( ///< @var array of array("$type|$type2" => "$function/$function2") functions used in editing, [0] - edit and insert, [1] - edit only
		array(
			"char" => "md5/sha1/password/encrypt/uuid", //! JavaScript for disabling maxlength
			"binary" => "md5/sha1",
			"date|time" => "now",
		), array(
			"(^|[^o])int|float|double|decimal" => "+/-", // not point
			"date" => "+ interval/- interval",
			"time" => "addtime/subtime",
			"char|text" => "concat",
		)
	);
}
 // must be included as last driver

define("SERVER", $_GET[DRIVER]); // read from pgsql=localhost
define("DB", $_GET["db"]); // for the sake of speed and size
define("ME", preg_replace('~^[^?]*/([^?]*).*~', '\\1', $_SERVER["REQUEST_URI"]) . '?'
	. (sid() ? SID . '&' : '')
	. (SERVER !== null ? DRIVER . "=" . urlencode(SERVER) . '&' : '')
	. (isset($_GET["username"]) ? "username=" . urlencode($_GET["username"]) . '&' : '')
	. (DB != "" ? 'db=' . urlencode(DB) . '&' . (isset($_GET["ns"]) ? "ns=" . urlencode($_GET["ns"]) . "&" : "") : '')
);


$VERSION = "3.7.1";


// any method change in this file should be transferred to editor/include/adminer.inc.php and plugins/plugin.php

class Adminer {
	/** @var array operators used in select, null for all operators */
	var $operators;
	
	/** Name in title and navigation
	* @return string HTML code
	*/
	function name() {
		return "<a href='http://www.adminer.org/' id='h1'>Adminer</a>";
	}
	
	/** Connection parameters
	* @return array ($server, $username, $password)
	*/
	function credentials() {
		return array(SERVER, $_GET["username"], get_session("pwds"));
	}
	
	/** Get key used for permanent login
	* @param bool
	* @return string cryptic string which gets combined with password or false in case of an error
	*/
	function permanentLogin($create = false) {
		return password_file($create);
	}
	
	/** Identifier of selected database
	* @return string
	*/
	function database() {
		// should be used everywhere instead of DB
		return DB;
	}
	
	/** Get cached list of databases
	* @param bool
	* @return array
	*/
	function databases($flush = true) {
		return get_databases($flush);
	}
	
	/** Specify limit for waiting on some slow queries like DB list
	* @return float number of seconds
	*/
	function queryTimeout() {
		return 5;
	}
	
	/** Headers to send before HTML output
	* @return bool true to send security headers
	*/
	function headers() {
		return true;
	}
	
	/** Print HTML code inside <head>
	* @return bool true to link adminer.css if exists
	*/
	function head() {
		return true;
	}
	
	/** Print login form
	* @return null
	*/
	function loginForm() {
		global $drivers;
		?>
<table cellspacing="0">
<tr><th><?php echo lang(21); ?><td><?php echo html_select("auth[driver]", $drivers, DRIVER, "loginDriver(this);"); ?>
<tr><th><?php echo lang(22); ?><td><input name="auth[server]" value="<?php echo h(SERVER); ?>" title="hostname[:port]" placeholder="localhost" autocapitalize="off">
<tr><th><?php echo lang(23); ?><td><input name="auth[username]" id="username" value="<?php echo h($_GET["username"]); ?>" autocapitalize="off">
<tr><th><?php echo lang(24); ?><td><input type="password" name="auth[password]">
<tr><th><?php echo lang(25); ?><td><input name="auth[db]" value="<?php echo h($_GET["db"]); ?>" autocapitalize="off">
</table>
<script type="text/javascript">
var username = document.getElementById('username');
focus(username);
username.form['auth[driver]'].onchange();
</script>
<?php
		echo "<p><input type='submit' value='" . lang(26) . "'>\n";
		echo checkbox("auth[permanent]", 1, $_COOKIE["adminer_permanent"], lang(27)) . "\n";
	}
	
	/** Authorize the user
	* @param string
	* @param string
	* @return bool
	*/
	function login($login, $password) {
		return true;
	}
	
	/** Table caption used in navigation and headings
	* @param array result of SHOW TABLE STATUS
	* @return string HTML code, "" to ignore table
	*/
	function tableName($tableStatus) {
		return h($tableStatus["Name"]);
	}
	
	/** Field caption used in select and edit
	* @param array single field returned from fields()
	* @param int order of column in select
	* @return string HTML code, "" to ignore field
	*/
	function fieldName($field, $order = 0) {
		return '<span title="' . h($field["full_type"]) . '">' . h($field["field"]) . '</span>';
	}
	
	/** Print links after select heading
	* @param array result of SHOW TABLE STATUS
	* @param string new item options, NULL for no new item
	* @return null
	*/
	function selectLinks($tableStatus, $set = "") {
		echo '<p class="tabs">';
		$links = array("select" => lang(28), "table" => lang(29));
		if (is_view($tableStatus)) {
			$links["view"] = lang(30);
		} else {
			$links["create"] = lang(31);
		}
		if ($set !== null) {
			$links["edit"] = lang(32);
		}
		foreach ($links as $key => $val) {
			echo " <a href='" . h(ME) . "$key=" . urlencode($tableStatus["Name"]) . ($key == "edit" ? $set : "") . "'" . bold(isset($_GET[$key])) . ">$val</a>";
		}
		echo "\n";
	}
	
	/** Get foreign keys for table
	* @param string
	* @return array same format as foreign_keys()
	*/
	function foreignKeys($table) {
		return foreign_keys($table);
	}
	
	/** Find backward keys for table
	* @param string
	* @param string
	* @return array $return[$target_table]["keys"][$key_name][$target_column] = $source_column; $return[$target_table]["name"] = $this->tableName($target_table);
	*/
	function backwardKeys($table, $tableName) {
		return array();
	}
	
	/** Print backward keys for row
	* @param array result of $this->backwardKeys()
	* @param array
	* @return null
	*/
	function backwardKeysPrint($backwardKeys, $row) {
	}
	
	/** Query printed in select before execution
	* @param string query to be executed
	* @return string
	*/
	function selectQuery($query) {
		global $jush, $token;
		return "<form action='" . h(ME) . "sql=' method='post'><p><span onclick=\"return !selectEditSql(event, this, '" . lang(33) . "');\">"
			. "<code class='jush-$jush'>" . h(str_replace("\n", " ", $query)) . "</code>"
			. " <a href='" . h(ME) . "sql=" . urlencode($query) . "'>" . lang(34) . "</a>"
			. "</span><input type='hidden' name='token' value='$token'></p></form>\n"; // </p> - required for IE9 inline edit
	}
	
	/** Description of a row in a table
	* @param string
	* @return string SQL expression, empty string for no description
	*/
	function rowDescription($table) {
		return "";
	}
	
	/** Get descriptions of selected data
	* @param array all data to print
	* @param array
	* @return array
	*/
	function rowDescriptions($rows, $foreignKeys) {
		return $rows;
	}
	
	/** Get a link to use in select table
	* @param string raw value of the field
	* @param array single field returned from fields()
	* @return string or null to create the default link
	*/
	function selectLink($val, $field) {
	}
	
	/** Value printed in select table
	* @param string HTML-escaped value to print
	* @param string link to foreign key
	* @param array single field returned from fields()
	* @return string
	*/
	function selectVal($val, $link, $field) {
		$return = ($val === null ? "<i>NULL</i>" : (ereg("char|binary", $field["type"]) && !ereg("var", $field["type"]) ? "<code>$val</code>" : $val));
		if (ereg('blob|bytea|raw|file', $field["type"]) && !is_utf8($val)) {
			$return = lang(35, strlen(html_entity_decode($val, ENT_QUOTES)));
		}
		return ($link ? "<a href='" . h($link) . "'>$return</a>" : $return);
	}
	
	/** Value conversion used in select and edit
	* @param string
	* @param array single field returned from fields()
	* @return string
	*/
	function editVal($val, $field) {
		return $val;
	}
	
	/** Print columns box in select
	* @param array result of selectColumnsProcess()[0]
	* @param array selectable columns
	* @return null
	*/
	function selectColumnsPrint($select, $columns) {
		global $functions, $grouping;
		print_fieldset("select", lang(36), $select);
		$i = 0;
		$fun_group = array(lang(37) => $functions, lang(38) => $grouping);
		foreach ($select as $key => $val) {
			$val = $_GET["columns"][$key];
			echo "<div>" . html_select("columns[$i][fun]", array(-1 => "") + $fun_group, $val["fun"]);
			echo "(<select name='columns[$i][col]' onchange='selectFieldChange(this.form);'><option>" . optionlist($columns, $val["col"], true) . "</select>)</div>\n";
			$i++;
		}
		echo "<div>" . html_select("columns[$i][fun]", array(-1 => "") + $fun_group, "", "this.nextSibling.nextSibling.onchange();");
		echo "(<select name='columns[$i][col]' onchange='selectAddRow(this);'><option>" . optionlist($columns, null, true) . "</select>)</div>\n";
		echo "</div></fieldset>\n";
	}
	
	/** Print search box in select
	* @param array result of selectSearchProcess()
	* @param array selectable columns
	* @param array
	* @return null
	*/
	function selectSearchPrint($where, $columns, $indexes) {
		print_fieldset("search", lang(39), $where);
		foreach ($indexes as $i => $index) {
			if ($index["type"] == "FULLTEXT") {
				echo "(<i>" . implode("</i>, <i>", array_map('h', $index["columns"])) . "</i>) AGAINST";
				echo " <input type='search' name='fulltext[$i]' value='" . h($_GET["fulltext"][$i]) . "' onchange='selectFieldChange(this.form);'>";
				echo checkbox("boolean[$i]", 1, isset($_GET["boolean"][$i]), "BOOL");
				echo "<br>\n";
			}
		}
		$_GET["where"] = (array) $_GET["where"];
		reset($_GET["where"]);
		$change_next = "this.nextSibling.onchange();";
		for ($i = 0; $i <= count($_GET["where"]); $i++) {
			list(, $val) = each($_GET["where"]);
			if (!$val || ("$val[col]$val[val]" != "" && in_array($val["op"], $this->operators))) {
				echo "<div><select name='where[$i][col]' onchange='$change_next'><option value=''>(" . lang(40) . ")" . optionlist($columns, $val["col"], true) . "</select>";
				echo html_select("where[$i][op]", $this->operators, $val["op"], $change_next);
				echo "<input type='search' name='where[$i][val]' value='" . h($val["val"]) . "' onchange='" . ($val ? "selectFieldChange(this.form)" : "selectAddRow(this)") . ";' onsearch='selectSearchSearch(this);'></div>\n";
			}
		}
		echo "</div></fieldset>\n";
	}
	
	/** Print order box in select
	* @param array result of selectOrderProcess()
	* @param array selectable columns
	* @param array
	* @return null
	*/
	function selectOrderPrint($order, $columns, $indexes) {
		print_fieldset("sort", lang(41), $order);
		$i = 0;
		foreach ((array) $_GET["order"] as $key => $val) {
			if (isset($columns[$val])) {
				echo "<div><select name='order[$i]' onchange='selectFieldChange(this.form);'><option>" . optionlist($columns, $val, true) . "</select>";
				echo checkbox("desc[$i]", 1, isset($_GET["desc"][$key]), lang(42)) . "</div>\n";
				$i++;
			}
		}
		echo "<div><select name='order[$i]' onchange='selectAddRow(this);'><option>" . optionlist($columns, null, true) . "</select>";
		echo checkbox("desc[$i]", 1, false, lang(42)) . "</div>\n";
		echo "</div></fieldset>\n";
	}
	
	/** Print limit box in select
	* @param string result of selectLimitProcess()
	* @return null
	*/
	function selectLimitPrint($limit) {
		echo "<fieldset><legend>" . lang(43) . "</legend><div>"; // <div> for easy styling
		echo "<input type='number' name='limit' class='size' value='" . h($limit) . "' onchange='selectFieldChange(this.form);'>";
		echo "</div></fieldset>\n";
	}
	
	/** Print text length box in select
	* @param string result of selectLengthProcess()
	* @return null
	*/
	function selectLengthPrint($text_length) {
		if ($text_length !== null) {
			echo "<fieldset><legend>" . lang(44) . "</legend><div>";
			echo "<input type='number' name='text_length' class='size' value='" . h($text_length) . "'>";
			echo "</div></fieldset>\n";
		}
	}
	
	/** Print action box in select
	* @param array
	* @return null
	*/
	function selectActionPrint($indexes) {
		echo "<fieldset><legend>" . lang(45) . "</legend><div>";
		echo "<input type='submit' value='" . lang(36) . "'>";
		echo " <span id='noindex' title='" . lang(46) . "'></span>";
		echo "<script type='text/javascript'>\n";
		echo "var indexColumns = ";
		$columns = array();
		foreach ($indexes as $index) {
			if ($index["type"] != "FULLTEXT") {
				$columns[reset($index["columns"])] = 1;
			}
		}
		$columns[""] = 1;
		foreach ($columns as $key => $val) {
			json_row($key);
		}
		echo ";\n";
		echo "selectFieldChange(document.getElementById('form'));\n";
		echo "</script>\n";
		echo "</div></fieldset>\n";
	}
	
	/** Print command box in select
	* @return bool whether to print default commands
	*/
	function selectCommandPrint() {
		return !information_schema(DB);
	}
	
	/** Print import box in select
	* @return bool whether to print default import
	*/
	function selectImportPrint() {
		return !information_schema(DB);
	}
	
	/** Print extra text in the end of a select form
	* @param array fields holding e-mails
	* @param array selectable columns
	* @return null
	*/
	function selectEmailPrint($emailFields, $columns) {
	}
	
	/** Process columns box in select
	* @param array selectable columns
	* @param array
	* @return array (array(select_expressions), array(group_expressions))
	*/
	function selectColumnsProcess($columns, $indexes) {
		global $functions, $grouping;
		$select = array(); // select expressions, empty for *
		$group = array(); // expressions without aggregation - will be used for GROUP BY if an aggregation function is used
		foreach ((array) $_GET["columns"] as $key => $val) {
			if ($val["fun"] == "count" || (isset($columns[$val["col"]]) && (!$val["fun"] || in_array($val["fun"], $functions) || in_array($val["fun"], $grouping)))) {
				$select[$key] = apply_sql_function($val["fun"], (isset($columns[$val["col"]]) ? idf_escape($val["col"]) : "*"));
				if (!in_array($val["fun"], $grouping)) {
					$group[] = $select[$key];
				}
			}
		}
		return array($select, $group);
	}
	
	/** Process search box in select
	* @param array
	* @param array
	* @return array expressions to join by AND
	*/
	function selectSearchProcess($fields, $indexes) {
		global $jush;
		$return = array();
		foreach ($indexes as $i => $index) {
			if ($index["type"] == "FULLTEXT" && $_GET["fulltext"][$i] != "") {
				$return[] = "MATCH (" . implode(", ", array_map('idf_escape', $index["columns"])) . ") AGAINST (" . q($_GET["fulltext"][$i]) . (isset($_GET["boolean"][$i]) ? " IN BOOLEAN MODE" : "") . ")";
			}
		}
		foreach ((array) $_GET["where"] as $val) {
			if ("$val[col]$val[val]" != "" && in_array($val["op"], $this->operators)) {
				$cond = " $val[op]";
				if (ereg('IN$', $val["op"])) {
					$in = process_length($val["val"]);
					$cond .= " (" . ($in != "" ? $in : "NULL") . ")";
				} elseif ($val["op"] == "SQL") {
					$cond = " $val[val]"; // SQL injection
				} elseif ($val["op"] == "LIKE %%") {
					$cond = " LIKE " . $this->processInput($fields[$val["col"]], "%$val[val]%");
				} elseif (!ereg('NULL$', $val["op"])) {
					$cond .= " " . $this->processInput($fields[$val["col"]], $val["val"]);
				}
				if ($val["col"] != "") {
					$return[] = idf_escape($val["col"]) . $cond;
				} else {
					// find anywhere
					$cols = array();
					foreach ($fields as $name => $field) {
						$is_text = ereg('char|text|enum|set', $field["type"]);
						if ((is_numeric($val["val"]) || !ereg('(^|[^o])int|float|double|decimal|bit', $field["type"]))
							&& (!ereg("[\x80-\xFF]", $val["val"]) || $is_text)
						) {
							$name = idf_escape($name);
							$cols[] = ($jush == "sql" && $is_text && !ereg('^utf8', $field["collation"]) ? "CONVERT($name USING utf8)" : $name);
						}
					}
					$return[] = ($cols ? "(" . implode("$cond OR ", $cols) . "$cond)" : "0");
				}
			}
		}
		return $return;
	}
	
	/** Process order box in select
	* @param array
	* @param array
	* @return array expressions to join by comma
	*/
	function selectOrderProcess($fields, $indexes) {
		$return = array();
		foreach ((array) $_GET["order"] as $key => $val) {
			if (isset($fields[$val]) || preg_match('~^((COUNT\\(DISTINCT |[A-Z0-9_]+\\()(`(?:[^`]|``)+`|"(?:[^"]|"")+")\\)|COUNT\\(\\*\\))$~', $val)) { //! MS SQL uses []
				$return[] = (isset($fields[$val]) ? idf_escape($val) : $val) . (isset($_GET["desc"][$key]) ? " DESC" : "");
			}
		}
		return $return;
	}
	
	/** Process limit box in select
	* @return string expression to use in LIMIT, will be escaped
	*/
	function selectLimitProcess() {
		return (isset($_GET["limit"]) ? $_GET["limit"] : "50");
	}
	
	/** Process length box in select
	* @return string number of characters to shorten texts, will be escaped
	*/
	function selectLengthProcess() {
		return (isset($_GET["text_length"]) ? $_GET["text_length"] : "100");
	}
	
	/** Process extras in select form
	* @param array AND conditions
	* @param array
	* @return bool true if processed, false to process other parts of form
	*/
	function selectEmailProcess($where, $foreignKeys) {
		return false;
	}
	
	/** Build SQL query used in select
	* @param array result of selectColumnsProcess()[0]
	* @param array result of selectSearchProcess()
	* @param array result of selectColumnsProcess()[1]
	* @param array result of selectOrderProcess()
	* @param int result of selectLimitProcess()
	* @param int index of page starting at zero
	* @return string empty string to use default query
	*/
	function selectQueryBuild($select, $where, $group, $order, $limit, $page) {
		return "";
	}
	
	/** Query printed after execution in the message
	* @param string executed query
	* @return string
	*/
	function messageQuery($query) {
		global $jush;
		restart_session();
		$history = &get_session("queries");
		$id = "sql-" . count($history[$_GET["db"]]);
		if (strlen($query) > 1e6) {
			$query = ereg_replace('[\x80-\xFF]+$', '', substr($query, 0, 1e6)) . "\n..."; // [\x80-\xFF] - valid UTF-8, \n - can end by one-line comment
		}
		$history[$_GET["db"]][] = array($query, time()); // not DB - $_GET["db"] is changed in database.inc.php //! respect $_GET["ns"]
		return " <span class='time'>" . @date("H:i:s") . "</span> <a href='#$id' onclick=\"return !toggle('$id');\">" . lang(47) . "</a><div id='$id' class='hidden'><pre><code class='jush-$jush'>" . shorten_utf8($query, 1000) . '</code></pre><p><a href="' . h(str_replace("db=" . urlencode(DB), "db=" . urlencode($_GET["db"]), ME) . 'sql=&history=' . (count($history[$_GET["db"]]) - 1)) . '">' . lang(34) . '</a></div>'; // @ - time zone may be not set
	}
	
	/** Functions displayed in edit form
	* @param array single field from fields()
	* @return array
	*/
	function editFunctions($field) {
		global $edit_functions;
		$return = ($field["null"] ? "NULL/" : "");
		foreach ($edit_functions as $key => $functions) {
			if (!$key || (!isset($_GET["call"]) && (isset($_GET["select"]) || where($_GET)))) { // relative functions
				foreach ($functions as $pattern => $val) {
					if (!$pattern || ereg($pattern, $field["type"])) {
						$return .= "/$val";
					}
				}
				if ($key && !ereg('set|blob|bytea|raw|file', $field["type"])) {
					$return .= "/SQL";
				}
			}
		}
		return explode("/", $return);
	}
	
	/** Get options to display edit field
	* @param string table name
	* @param array single field from fields()
	* @param string attributes to use inside the tag
	* @param string
	* @return string custom input field or empty string for default
	*/
	function editInput($table, $field, $attrs, $value) {
		if ($field["type"] == "enum") {
			return (isset($_GET["select"]) ? "<label><input type='radio'$attrs value='-1' checked><i>" . lang(6) . "</i></label> " : "")
				. ($field["null"] ? "<label><input type='radio'$attrs value=''" . ($value !== null || isset($_GET["select"]) ? "" : " checked") . "><i>NULL</i></label> " : "")
				. enum_input("radio", $attrs, $field, $value, 0) // 0 - empty
			;
		}
		return "";
	}
	
	/** Process sent input
	* @param array single field from fields()
	* @param string
	* @param string
	* @return string expression to use in a query
	*/
	function processInput($field, $value, $function = "") {
		if ($function == "SQL") {
			return $value; // SQL injection
		}
		$name = $field["field"];
		$return = q($value);
		if (ereg('^(now|getdate|uuid)$', $function)) {
			$return = "$function()";
		} elseif (ereg('^current_(date|timestamp)$', $function)) {
			$return = $function;
		} elseif (ereg('^([+-]|\\|\\|)$', $function)) {
			$return = idf_escape($name) . " $function $return";
		} elseif (ereg('^[+-] interval$', $function)) {
			$return = idf_escape($name) . " $function " . (preg_match("~^(\\d+|'[0-9.: -]') [A-Z_]+$~i", $value) ? $value : $return);
		} elseif (ereg('^(addtime|subtime|concat)$', $function)) {
			$return = "$function(" . idf_escape($name) . ", $return)";
		} elseif (ereg('^(md5|sha1|password|encrypt)$', $function)) {
			$return = "$function($return)";
		}
		return unconvert_field($field, $return);
	}
	
	/** Returns export output options
	* @return array
	*/
	function dumpOutput() {
		$return = array('text' => lang(48), 'file' => lang(49));
		if (function_exists('gzencode')) {
			$return['gz'] = 'gzip';
		}
		return $return;
	}
	
	/** Returns export format options
	* @return array empty to disable export
	*/
	function dumpFormat() {
		return array('sql' => 'SQL', 'csv' => 'CSV,', 'csv;' => 'CSV;', 'tsv' => 'TSV');
	}
	
	/** Export database structure
	* @param string
	* @return null prints data
	*/
	function dumpDatabase($db) {
	}
	
	/** Export table structure
	* @param string
	* @param string
	* @param int 0 table, 1 view, 2 temporary view table
	* @return null prints data
	*/
	function dumpTable($table, $style, $is_view = 0) {
		if ($_POST["format"] != "sql") {
			echo "\xef\xbb\xbf"; // UTF-8 byte order mark
			if ($style) {
				dump_csv(array_keys(fields($table)));
			}
		} elseif ($style) {
			if ($is_view == 2) {
				$fields = array();
				foreach (fields($table) as $name => $field) {
					$fields[] = idf_escape($name) . " $field[full_type]";
				}
				$create = "CREATE TABLE " . table($table) . " (" . implode(", ", $fields) . ")";
			} else {
				$create = create_sql($table, $_POST["auto_increment"]);
			}
			if ($create) {
				if ($style == "DROP+CREATE" || $is_view == 1) {
					echo "DROP " . ($is_view == 2 ? "VIEW" : "TABLE") . " IF EXISTS " . table($table) . ";\n";
				}
				if ($is_view == 1) {
					$create = remove_definer($create);
				}
				echo "$create;\n\n";
			}
		}
	}
	
	/** Export table data
	* @param string
	* @param string
	* @param string
	* @return null prints data
	*/
	function dumpData($table, $style, $query) {
		global $connection, $jush;
		$max_packet = ($jush == "sqlite" ? 0 : 1048576); // default, minimum is 1024
		if ($style) {
			if ($_POST["format"] == "sql") {
				if ($style == "TRUNCATE+INSERT") {
					echo truncate_sql($table) . ";\n";
				}
				$fields = fields($table);
			}
			$result = $connection->query($query, 1); // 1 - MYSQLI_USE_RESULT //! enum and set as numbers
			if ($result) {
				$insert = "";
				$buffer = "";
				$keys = array();
				$suffix = "";
				$fetch_function = ($table != '' ? 'fetch_assoc' : 'fetch_row');
				while ($row = $result->$fetch_function()) {
					if (!$keys) {
						$values = array();
						foreach ($row as $val) {
							$field = $result->fetch_field();
							$keys[] = $field->name;
							$key = idf_escape($field->name);
							$values[] = "$key = VALUES($key)";
						}
						$suffix = ($style == "INSERT+UPDATE" ? "\nON DUPLICATE KEY UPDATE " . implode(", ", $values) : "") . ";\n";
					}
					if ($_POST["format"] != "sql") {
						if ($style == "table") {
							dump_csv($keys);
							$style = "INSERT";
						}
						dump_csv($row);
					} else {
						if (!$insert) {
							$insert = "INSERT INTO " . table($table) . " (" . implode(", ", array_map('idf_escape', $keys)) . ") VALUES";
						}
						foreach ($row as $key => $val) {
							$field = $fields[$key];
							$row[$key] = ($val !== null
								? unconvert_field($field, ereg('(^|[^o])int|float|double|decimal', $field["type"]) && $val != '' ? $val : q($val))
								: "NULL"
							);
						}
						$s = ($max_packet ? "\n" : " ") . "(" . implode(",\t", $row) . ")";
						if (!$buffer) {
							$buffer = $insert . $s;
						} elseif (strlen($buffer) + 4 + strlen($s) + strlen($suffix) < $max_packet) { // 4 - length specification
							$buffer .= ",$s";
						} else {
							echo $buffer . $suffix;
							$buffer = $insert . $s;
						}
					}
				}
				if ($buffer) {
					echo $buffer . $suffix;
				}
			} elseif ($_POST["format"] == "sql") {
				echo "-- " . str_replace("\n", " ", $connection->error) . "\n";
			}
		}
	}
	
	/** Set export filename
	* @param string
	* @return string filename without extension
	*/
	function dumpFilename($identifier) {
		return friendly_url($identifier != "" ? $identifier : (SERVER != "" ? SERVER : "localhost"));
	}
	
	/** Send headers for export
	* @param string
	* @param bool
	* @return string extension
	*/
	function dumpHeaders($identifier, $multi_table = false) {
		$output = $_POST["output"];
		$ext = (ereg('sql', $_POST["format"]) ? "sql" : ($multi_table ? "tar" : "csv")); // multiple CSV packed to TAR
		header("Content-Type: " .
			($output == "gz" ? "application/x-gzip" :
			($ext == "tar" ? "application/x-tar" :
			($ext == "sql" || $output != "file" ? "text/plain" : "text/csv") . "; charset=utf-8"
		)));
		if ($output == "gz") {
			ob_start('gzencode', 1e6);
		}
		return $ext;
	}
	
	/** Print homepage
	* @return bool whether to print default homepage
	*/
	function homepage() {
		echo '<p>' . ($_GET["ns"] == "" ? '<a href="' . h(ME) . 'database=">' . lang(50) . "</a>\n" : "");
		echo (support("scheme") ? "<a href='" . h(ME) . "scheme='>" . ($_GET["ns"] != "" ? lang(51) : lang(52)) . "</a>\n" : "");
		echo ($_GET["ns"] !== "" ? '<a href="' . h(ME) . 'schema=">' . lang(53) . "</a>\n" : "");
		echo (support("privileges") ? "<a href='" . h(ME) . "privileges='>" . lang(54) . "</a>\n" : "");
		return true;
	}
	
	/** Prints navigation after Adminer title
	* @param string can be "auth" if there is no database connection, "db" if there is no database selected, "ns" with invalid schema
	* @return null
	*/
	function navigation($missing) {
		global $VERSION, $token, $jush, $drivers;
		?>
<h1>
<?php echo $this->name(); ?> <span class="version"><?php echo $VERSION; ?></span>
<a href="http://www.adminer.org/#download" id="version"><?php echo (version_compare($VERSION, $_COOKIE["adminer_version"]) < 0 ? h($_COOKIE["adminer_version"]) : ""); ?></a>
</h1>
<?php
		if ($missing == "auth") {
			$first = true;
			foreach ((array) $_SESSION["pwds"] as $driver => $servers) {
				foreach ($servers as $server => $usernames) {
					foreach ($usernames as $username => $password) {
						if ($password !== null) {
							if ($first) {
								echo "<p id='logins' onmouseover='menuOver(this, event);' onmouseout='menuOut(this);'>\n";
								$first = false;
							}
							$dbs = $_SESSION["db"][$driver][$server][$username];
							foreach (($dbs ? array_keys($dbs) : array("")) as $db) {
								echo "<a href='" . h(auth_url($driver, $server, $username, $db)) . "'>($drivers[$driver]) " . h($username . ($server != "" ? "@$server" : "") . ($db != "" ? " - $db" : "")) . "</a><br>\n";
							}
						}
					}
				}
			}
		} else {
			?>
<form action="" method="post">
<p class="logout">
<?php
			if (DB == "" || !$missing) {
				echo "<a href='" . h(ME) . "sql='" . bold(isset($_GET["sql"])) . " title='" . lang(55) . "'>" . lang(47) . "</a>\n";
				if (support("dump")) {
					echo "<a href='" . h(ME) . "dump=" . urlencode(isset($_GET["table"]) ? $_GET["table"] : $_GET["select"]) . "' id='dump'" . bold(isset($_GET["dump"])) . ">" . lang(56) . "</a>\n";
				}
			}
			?>
<input type="submit" name="logout" value="<?php echo lang(57); ?>" id="logout">
<input type="hidden" name="token" value="<?php echo $token; ?>">
</p>
</form>
<?php
			$this->databasesPrint($missing);
			if ($_GET["ns"] !== "" && !$missing && DB != "") {
				echo '<p><a href="' . h(ME) . 'create="' . bold($_GET["create"] === "") . ">" . lang(58) . "</a>\n";
				$tables = table_status('', true);
				if (!$tables) {
					echo "<p class='message'>" . lang(7) . "\n";
				} else {
					$this->tablesPrint($tables);
					$links = array();
					foreach ($tables as $table => $type) {
						$links[] = preg_quote($table, '/');
					}
					echo "<script type='text/javascript'>\n";
					echo "var jushLinks = { $jush: [ '" . js_escape(ME) . "table=\$&', /\\b(" . implode("|", $links) . ")\\b/g ] };\n";
					foreach (array("bac", "bra", "sqlite_quo", "mssql_bra") as $val) {
						echo "jushLinks.$val = jushLinks.$jush;\n";
					}
					echo "</script>\n";
				}
			}
		}
	}
	
	/** Prints databases list in menu
	* @param string
	* @return null
	*/
	function databasesPrint($missing) {
		global $connection;
		$databases = $this->databases();
		?>
<form action="">
<p id="dbs">
<?php
		hidden_fields_get();
		$db_events = " onmousedown='dbMouseDown(event, this);' onchange='dbChange(this);'";
		echo ($databases
			? "<select name='db'$db_events>" . optionlist(array("" => "(" . lang(59) . ")") + $databases, DB) . "</select>"
			: '<input name="db" value="' . h(DB) . '" autocapitalize="off">'
		);
		echo "<input type='submit' value='" . lang(10) . "'" . ($databases ? " class='hidden'" : "") . ">\n";
		if ($missing != "db" && DB != "" && $connection->select_db(DB)) {
			if (support("scheme")) {
				echo "<br><select name='ns'$db_events>" . optionlist(array("" => "(" . lang(60) . ")") + schemas(), $_GET["ns"]) . "</select>";
				if ($_GET["ns"] != "") {
					set_schema($_GET["ns"]);
				}
			}
		}
		echo (isset($_GET["sql"]) ? '<input type="hidden" name="sql" value="">'
			: (isset($_GET["schema"]) ? '<input type="hidden" name="schema" value="">'
			: (isset($_GET["dump"]) ? '<input type="hidden" name="dump" value="">'
		: "")));
		echo "</p></form>\n";
	}
	
	/** Prints table list in menu
	* @param array result of table_status('', true)
	* @return null
	*/
	function tablesPrint($tables) {
		echo "<p id='tables' onmouseover='menuOver(this, event);' onmouseout='menuOut(this);'>\n";
		foreach ($tables as $table => $status) {
			echo '<a href="' . h(ME) . 'select=' . urlencode($table) . '"' . bold($_GET["select"] == $table || $_GET["edit"] == $table) . ">" . lang(61) . "</a> ";
			echo '<a href="' . h(ME) . 'table=' . urlencode($table) . '"' . bold(in_array($table, array($_GET["table"], $_GET["create"], $_GET["indexes"], $_GET["foreign"], $_GET["trigger"]))) . " title='" . lang(29) . "'>" . $this->tableName($status) . "</a><br>\n";
		}
	}
	
}

$adminer = (function_exists('adminer_object') ? adminer_object() : new Adminer);
if ($adminer->operators === null) {
	$adminer->operators = $operators;
}


/** Print HTML header
* @param string used in title, breadcrumb and heading, should be HTML escaped
* @param string
* @param mixed array("key" => "link=desc", "key2" => array("link", "desc")), null for nothing, false for driver only, true for driver and server
* @param string used after colon in title and heading, will be HTML escaped
* @return null
*/
function page_header($title, $error = "", $breadcrumb = array(), $title2 = "") {
	global $LANG, $adminer, $connection, $drivers;
	header("Content-Type: text/html; charset=utf-8");
	if ($adminer->headers()) {
		header("X-Frame-Options: deny"); // ClickJacking protection in IE8, Safari 4, Chrome 2, Firefox 3.6.9
		header("X-XSS-Protection: 0"); // prevents introducing XSS in IE8 by removing safe parts of the page
	}
	$title_all = $title . ($title2 != "" ? ": " . h($title2) : "");
	$title_page = strip_tags($title_all . (SERVER != "" && SERVER != "localhost" ? h(" - " . SERVER) : "") . " - " . $adminer->name());
	?>
<!DOCTYPE html>
<html lang="<?php echo $LANG; ?>" dir="<?php echo lang(62); ?>">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="robots" content="noindex">
<title><?php echo $title_page; ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo h(preg_replace("~\\?.*~", "", ME)) . "?file=default.css&amp;version=3.7.1"; ?>">
<script type="text/javascript" src="<?php echo h(preg_replace("~\\?.*~", "", ME)) . "?file=functions.js&amp;version=3.7.1"; ?>"></script>
<?php if ($adminer->head()) { ?>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo h(preg_replace("~\\?.*~", "", ME)) . "?file=favicon.ico&amp;version=3.7.1"; ?>">
<link rel="apple-touch-icon" href="<?php echo h(preg_replace("~\\?.*~", "", ME)) . "?file=favicon.ico&amp;version=3.7.1"; ?>">
<?php if (file_exists("adminer.css")) { ?>
<link rel="stylesheet" type="text/css" href="adminer.css">
<?php }  } ?>

<body class="<?php echo lang(62); ?> nojs" onkeydown="bodyKeydown(event);" onclick="bodyClick(event);" onload="bodyLoad('<?php echo (is_object($connection) ? substr($connection->server_info, 0, 3) : ""); ?>');<?php echo (isset($_COOKIE["adminer_version"]) ? "" : " verifyVersion();"); ?>">
<script type="text/javascript">
document.body.className = document.body.className.replace(/ nojs/, ' js');
</script>

<div id="content">
<?php
	if ($breadcrumb !== null) {
		$link = substr(preg_replace('~(username|db|ns)=[^&]*&~', '', ME), 0, -1);
		echo '<p id="breadcrumb"><a href="' . h($link ? $link : ".") . '">' . $drivers[DRIVER] . '</a> &raquo; ';
		$link = substr(preg_replace('~(db|ns)=[^&]*&~', '', ME), 0, -1);
		$server = (SERVER != "" ? h(SERVER) : lang(22));
		if ($breadcrumb === false) {
			echo "$server\n";
		} else {
			echo "<a href='" . ($link ? h($link) : ".") . "' accesskey='1' title='Alt+Shift+1'>$server</a> &raquo; ";
			if ($_GET["ns"] != "" || (DB != "" && is_array($breadcrumb))) {
				echo '<a href="' . h($link . "&db=" . urlencode(DB) . (support("scheme") ? "&ns=" : "")) . '">' . h(DB) . '</a> &raquo; ';
			}
			if (is_array($breadcrumb)) {
				if ($_GET["ns"] != "") {
					echo '<a href="' . h(substr(ME, 0, -1)) . '">' . h($_GET["ns"]) . '</a> &raquo; ';
				}
				foreach ($breadcrumb as $key => $val) {
					$desc = (is_array($val) ? $val[1] : $val);
					if ($desc != "") {
						echo '<a href="' . h(ME . "$key=") . urlencode(is_array($val) ? $val[0] : $val) . '">' . h($desc) . '</a> &raquo; ';
					}
				}
			}
			echo "$title\n";
		}
	}
	echo "<h2>$title_all</h2>\n";
	restart_session();
	$uri = preg_replace('~^[^?]*~', '', $_SERVER["REQUEST_URI"]);
	$messages = $_SESSION["messages"][$uri];
	if ($messages) {
		echo "<div class='message'>" . implode("</div>\n<div class='message'>", $messages) . "</div>\n";
		unset($_SESSION["messages"][$uri]);
	}
	$databases = &get_session("dbs");
	if (DB != "" && $databases && !in_array(DB, $databases, true)) {
		$databases = null;
	}
	stop_session();
	if ($error) {
		echo "<div class='error'>$error</div>\n";
	}
	define("PAGE_HEADER", 1);
}

/** Print HTML footer
* @param string "auth", "db", "ns"
* @return null
*/
function page_footer($missing = "") {
	global $adminer;
	?>
</div>

<?php switch_lang(); ?>
<div id="menu">
<?php $adminer->navigation($missing); ?>
</div>
<script type="text/javascript">setupSubmitHighlight(document);</script>
<?php
}


/** PHP implementation of XXTEA encryption algorithm
* @author Ma Bingyao <andot@ujn.edu.cn>
* @link http://www.coolcode.cn/?action=show&id=128
*/

function int32($n) {
	while ($n >= 2147483648) {
		$n -= 4294967296;
	}
	while ($n <= -2147483649) {
		$n += 4294967296;
	}
	return (int) $n;
}

function long2str($v, $w) {
	$s = '';
	foreach ($v as $val) {
		$s .= pack('V', $val);
	}
	if ($w) {
		return substr($s, 0, end($v));
	}
	return $s;
}

function str2long($s, $w) {
	$v = array_values(unpack('V*', str_pad($s, 4 * ceil(strlen($s) / 4), "\0")));
	if ($w) {
		$v[] = strlen($s);
	}
	return $v;
}

function xxtea_mx($z, $y, $sum, $k) {
	return int32((($z >> 5 & 0x7FFFFFF) ^ $y << 2) + (($y >> 3 & 0x1FFFFFFF) ^ $z << 4)) ^ int32(($sum ^ $y) + ($k ^ $z));
}

/** Cipher
* @param string plain-text password
* @param string
* @return string binary cipher
*/
function encrypt_string($str, $key) {
	if ($str == "") {
		return "";
	}
	$key = array_values(unpack("V*", pack("H*", md5($key))));
	$v = str2long($str, true);
	$n = count($v) - 1;
	$z = $v[$n];
	$y = $v[0];
	$q = floor(6 + 52 / ($n + 1));
	$sum = 0;
	while ($q-- > 0) {
		$sum = int32($sum + 0x9E3779B9);
		$e = $sum >> 2 & 3;
		for ($p=0; $p < $n; $p++) {
			$y = $v[$p + 1];
			$mx = xxtea_mx($z, $y, $sum, $key[$p & 3 ^ $e]);
			$z = int32($v[$p] + $mx);
			$v[$p] = $z;
		}
		$y = $v[0];
		$mx = xxtea_mx($z, $y, $sum, $key[$p & 3 ^ $e]);
		$z = int32($v[$n] + $mx);
		$v[$n] = $z;
	}
	return long2str($v, false);
}

/** Decipher
* @param string binary cipher
* @param string
* @return string plain-text password
*/
function decrypt_string($str, $key) {
	if ($str == "") {
		return "";
	}
	if (!$key) {
		return false;
	}
	$key = array_values(unpack("V*", pack("H*", md5($key))));
	$v = str2long($str, false);
	$n = count($v) - 1;
	$z = $v[$n];
	$y = $v[0];
	$q = floor(6 + 52 / ($n + 1));
	$sum = int32($q * 0x9E3779B9);
	while ($sum) {
		$e = $sum >> 2 & 3;
		for ($p=$n; $p > 0; $p--) {
			$z = $v[$p - 1];
			$mx = xxtea_mx($z, $y, $sum, $key[$p & 3 ^ $e]);
			$y = int32($v[$p] - $mx);
			$v[$p] = $y;
		}
		$z = $v[$n];
		$mx = xxtea_mx($z, $y, $sum, $key[$p & 3 ^ $e]);
		$y = int32($v[0] - $mx);
		$v[0] = $y;
		$sum = int32($sum - 0x9E3779B9);
	}
	return long2str($v, true);
}


$connection = '';

$token = $_SESSION["token"];
if (!$_SESSION["token"]) {
	$_SESSION["token"] = rand(1, 1e6); // defense against cross-site request forgery
}

$permanent = array();
if ($_COOKIE["adminer_permanent"]) {
	foreach (explode(" ", $_COOKIE["adminer_permanent"]) as $val) {
		list($key) = explode(":", $val);
		$permanent[$key] = $val;
	}
}

$auth = $_POST["auth"];
if ($auth) {
	session_regenerate_id(); // defense against session fixation
	$_SESSION["pwds"][$auth["driver"]][$auth["server"]][$auth["username"]] = $auth["password"];
	$_SESSION["db"][$auth["driver"]][$auth["server"]][$auth["username"]][$auth["db"]] = true;
	if ($auth["permanent"]) {
		$key = base64_encode($auth["driver"]) . "-" . base64_encode($auth["server"]) . "-" . base64_encode($auth["username"]) . "-" . base64_encode($auth["db"]);
		$private = $adminer->permanentLogin(true);
		$permanent[$key] = "$key:" . base64_encode($private ? encrypt_string($auth["password"], $private) : "");
		cookie("adminer_permanent", implode(" ", $permanent));
	}
	if (count($_POST) == 1 // 1 - auth
		|| DRIVER != $auth["driver"]
		|| SERVER != $auth["server"]
		|| $_GET["username"] !== $auth["username"] // "0" == "00"
		|| DB != $auth["db"]
	) {
		redirect(auth_url($auth["driver"], $auth["server"], $auth["username"], $auth["db"]));
	}
	
} elseif ($_POST["logout"]) {
	if ($token && $_POST["token"] != $token) {
		page_header(lang(57), lang(63));
		page_footer("db");
		exit;
	} else {
		foreach (array("pwds", "db", "dbs", "queries") as $key) {
			set_session($key, null);
		}
		unset_permanent();
		redirect(substr(preg_replace('~(username|db|ns)=[^&]*&~', '', ME), 0, -1), lang(64));
	}
	
} elseif ($permanent && !$_SESSION["pwds"]) {
	session_regenerate_id();
	$private = $adminer->permanentLogin();
	foreach ($permanent as $key => $val) {
		list(, $cipher) = explode(":", $val);
		list($driver, $server, $username, $db) = array_map('base64_decode', explode("-", $key));
		$_SESSION["pwds"][$driver][$server][$username] = decrypt_string(base64_decode($cipher), $private);
		$_SESSION["db"][$driver][$server][$username][$db] = true;
	}
}

function unset_permanent() {
	global $permanent;
	foreach ($permanent as $key => $val) {
		list($driver, $server, $username, $db) = array_map('base64_decode', explode("-", $key));
		if ($driver == DRIVER && $server == SERVER && $username == $_GET["username"] && $db == DB) {
			unset($permanent[$key]);
		}
	}
	cookie("adminer_permanent", implode(" ", $permanent));
}

function auth_error($exception = null) {
	global $connection, $adminer, $token;
	$session_name = session_name();
	$error = "";
	if (!$_COOKIE[$session_name] && $_GET[$session_name] && ini_bool("session.use_only_cookies")) {
		$error = lang(65);
	} elseif (isset($_GET["username"])) {
		if (($_COOKIE[$session_name] || $_GET[$session_name]) && !$token) {
			$error = lang(66);
		} else {
			$password = &get_session("pwds");
			if ($password !== null) {
				$error = h($exception ? $exception->getMessage() : (is_string($connection) ? $connection : lang(67)));
				if ($password === false) {
					$error .= '<br>' . lang(68, '<code>permanentLogin()</code>');
				}
				$password = null;
			}
			unset_permanent();
		}
	}
	page_header(lang(26), $error, null);
	echo "<form action='' method='post'>\n";
	$adminer->loginForm();
	echo "<div>";
	hidden_fields($_POST, array("auth")); // expired session
	echo "</div>\n";
	echo "</form>\n";
	page_footer("auth");
}

if (isset($_GET["username"])) {
	if (!class_exists("Min_DB")) {
		unset($_SESSION["pwds"][DRIVER]);
		unset_permanent();
		page_header(lang(69), lang(70, implode(", ", $possible_drivers)), false);
		page_footer("auth");
		exit;
	}
	$connection = connect();
}

if (is_string($connection) || !$adminer->login($_GET["username"], get_session("pwds"))) {
	auth_error();
	exit;
}

$token = $_SESSION["token"]; ///< @var string CSRF protection
if ($auth && $_POST["token"]) {
	$_POST["token"] = $token; // reset token after explicit login
}

$error = ''; ///< @var string
if ($_POST) {
	if ($_POST["token"] != $token) {
		$ini = "max_input_vars";
		$max_vars = ini_get($ini);
		if (extension_loaded("suhosin")) {
			foreach (array("suhosin.request.max_vars", "suhosin.post.max_vars") as $key) {
				$val = ini_get($key);
				if ($val && (!$max_vars || $val < $max_vars)) {
					$ini = $key;
					$max_vars = $val;
				}
			}
		}
		$error = (!$_POST["token"] && $max_vars
			? lang(71, "'$ini'")
			: lang(63)
		);
	}
	
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
	// posted form with no data means that post_max_size exceeded because Adminer always sends token at least
	$error = lang(72, "'post_max_size'");
	if (isset($_GET["sql"])) {
		$error .= ' ' . lang(73);
	}
}


if (!ini_bool("session.use_cookies") || @ini_set("session.use_cookies", false) !== false) { // @ - may be disabled
	session_cache_limiter(""); // to allow restarting session
	session_write_close(); // improves concurrency if a user opens several pages at once, may be restarted later
}


function connect_error() {
	global $adminer, $connection, $token, $error, $drivers;
	$databases = array();
	if (DB != "") {
		header("HTTP/1.1 404 Not Found");
		page_header(lang(25) . ": " . h(DB), lang(74), true);
	} else {
		if ($_POST["db"] && !$error) {
			queries_redirect(substr(ME, 0, -1), lang(75), drop_databases($_POST["db"]));
		}
		
		page_header(lang(76), $error, false);
		echo "<p><a href='" . h(ME) . "database='>" . lang(77) . "</a>\n";
		foreach (array(
			'privileges' => lang(54),
			'processlist' => lang(78),
			'variables' => lang(79),
			'status' => lang(80),
		) as $key => $val) {
			if (support($key)) {
				echo "<a href='" . h(ME) . "$key='>$val</a>\n";
			}
		}
		echo "<p>" . lang(81, $drivers[DRIVER], "<b>$connection->server_info</b>", "<b>$connection->extension</b>") . "\n";
		echo "<p>" . lang(82, "<b>" . h(logged_user()) . "</b>") . "\n";
		$refresh = "<a href='" . h(ME) . "refresh=1'>" . lang(83) . "</a>\n";
		$databases = $adminer->databases();
		if ($databases) {
			$scheme = support("scheme");
			$collations = collations();
			echo "<form action='' method='post'>\n";
			echo "<table cellspacing='0' class='checkable' onclick='tableClick(event);' ondblclick='tableClick(event, true);'>\n";
			echo "<thead><tr><td>&nbsp;<th>" . lang(25) . "<td>" . lang(84) . "<td>" . lang(85) . "</thead>\n";
			
			foreach ($databases as $db) {
				$root = h(ME) . "db=" . urlencode($db);
				echo "<tr" . odd() . "><td>" . checkbox("db[]", $db, in_array($db, (array) $_POST["db"]));
				echo "<th><a href='$root'>" . h($db) . "</a>";
				echo "<td><a href='$root" . ($scheme ? "&amp;ns=" : "") . "&amp;database=' title='" . lang(50) . "'>" . nbsp(db_collation($db, $collations)) . "</a>";
				echo "<td align='right'><a href='$root&amp;schema=' id='tables-" . h($db) . "' title='" . lang(53) . "'>?</a>";
				echo "\n";
			}
			
			echo "</table>\n";
			echo "<script type='text/javascript'>tableCheck();</script>\n";
			echo "<p><input type='submit' name='drop' value='" . lang(86) . "'" . confirm("formChecked(this, /db/)") . ">\n";
			echo "<input type='hidden' name='token' value='$token'>\n";
			echo $refresh;
			echo "</form>\n";
		} else {
			echo "<p>$refresh";
		}
	}
	
	page_footer("db");
	if ($databases) {
		echo "<script type='text/javascript'>ajaxSetHtml('" . js_escape(ME) . "script=connect');</script>\n";
	}
}

if (isset($_GET["status"])) {
	$_GET["variables"] = $_GET["status"];
}
if (!(DB != "" ? $connection->select_db(DB) : isset($_GET["sql"]) || isset($_GET["dump"]) || isset($_GET["database"]) || isset($_GET["processlist"]) || isset($_GET["privileges"]) || isset($_GET["user"]) || isset($_GET["variables"]) || $_GET["script"] == "connect" || $_GET["script"] == "kill")) {
	if (DB != "" || $_GET["refresh"]) {
		restart_session();
		set_session("dbs", null);
	}
	connect_error(); // separate function to catch SQLite error
	exit;
}

if (support("scheme") && DB != "" && $_GET["ns"] !== "") {
	if (!isset($_GET["ns"])) {
		redirect(preg_replace('~ns=[^&]*&~', '', ME) . "ns=" . get_schema());
	}
	if (!set_schema($_GET["ns"])) {
		header("HTTP/1.1 404 Not Found");
		page_header(lang(87) . ": " . h($_GET["ns"]), lang(88), true);
		page_footer("ns");
		exit;
	}
}


/** Print select result
* @param Min_Result
* @param Min_DB connection to examine indexes
* @param string base link for <th> fields
* @param array
* @return null
*/
function select($result, $connection2 = null, $href = "", $orgtables = array()) {
	$links = array(); // colno => orgtable - create links from these columns
	$indexes = array(); // orgtable => array(column => colno) - primary keys
	$columns = array(); // orgtable => array(column => ) - not selected columns in primary key
	$blobs = array(); // colno => bool - display bytes for blobs
	$types = array(); // colno => type - display char in <code>
	$return = array(); // table => orgtable - mapping to use in EXPLAIN
	odd(''); // reset odd for each result
	for ($i=0; $row = $result->fetch_row(); $i++) {
		if (!$i) {
			echo "<table cellspacing='0' class='nowrap'>\n";
			echo "<thead><tr>";
			for ($j=0; $j < count($row); $j++) {
				$field = $result->fetch_field();
				$name = $field->name;
				$orgtable = $field->orgtable;
				$orgname = $field->orgname;
				$return[$field->table] = $orgtable;
				if ($href) { // MySQL EXPLAIN
					$links[$j] = ($name == "table" ? "table=" : ($name == "possible_keys" ? "indexes=" : null));
				} elseif ($orgtable != "") {
					if (!isset($indexes[$orgtable])) {
						// find primary key in each table
						$indexes[$orgtable] = array();
						foreach (indexes($orgtable, $connection2) as $index) {
							if ($index["type"] == "PRIMARY") {
								$indexes[$orgtable] = array_flip($index["columns"]);
								break;
							}
						}
						$columns[$orgtable] = $indexes[$orgtable];
					}
					if (isset($columns[$orgtable][$orgname])) {
						unset($columns[$orgtable][$orgname]);
						$indexes[$orgtable][$orgname] = $j;
						$links[$j] = $orgtable;
					}
				}
				if ($field->charsetnr == 63) { // 63 - binary
					$blobs[$j] = true;
				}
				$types[$j] = $field->type;
				$name = h($name);
				echo "<th" . ($orgtable != "" || $field->name != $orgname ? " title='" . h(($orgtable != "" ? "$orgtable." : "") . $orgname) . "'" : "") . ">"
					. ($href ? "<a href='$href" . strtolower($name) . "' target='_blank' rel='noreferrer' class='help'>$name</a>" : $name)
				;
			}
			echo "</thead>\n";
		}
		echo "<tr" . odd() . ">";
		foreach ($row as $key => $val) {
			if ($val === null) {
				$val = "<i>NULL</i>";
			} elseif ($blobs[$key] && !is_utf8($val)) {
				$val = "<i>" . lang(35, strlen($val)) . "</i>"; //! link to download
			} elseif (!strlen($val)) { // strlen - SQLite can return int
				$val = "&nbsp;"; // some content to print a border
			} else {
				$val = h($val);
				if ($types[$key] == 254) { // 254 - char
					$val = "<code>$val</code>";
				}
			}
			if (isset($links[$key]) && !$columns[$links[$key]]) {
				if ($href) { // MySQL EXPLAIN
					$table = $row[array_search("table=", $links)];
					$link = $links[$key] . urlencode($orgtables[$table] != "" ? $orgtables[$table] : $table);
				} else {
					$link = "edit=" . urlencode($links[$key]);
					foreach ($indexes[$links[$key]] as $col => $j) {
						$link .= "&where" . urlencode("[" . bracket_escape($col) . "]") . "=" . urlencode($row[$j]);
					}
				}
				$val = "<a href='" . h(ME . $link) . "'>$val</a>";
			}
			echo "<td>$val";
		}
	}
	echo ($i ? "</table>" : "<p class='message'>" . lang(89)) . "\n";
	return $return;
}

/** Get referencable tables with single column primary key except self
* @param string
* @return array ($table_name => $field)
*/
function referencable_primary($self) {
	$return = array(); // table_name => field
	foreach (table_status('', true) as $table_name => $table) {
		if ($table_name != $self && fk_support($table)) {
			foreach (fields($table_name) as $field) {
				if ($field["primary"]) {
					if ($return[$table_name]) { // multi column primary key
						unset($return[$table_name]);
						break;
					}
					$return[$table_name] = $field;
				}
			}
		}
	}
	return $return;
}

/** Print SQL <textarea> tag
* @param string
* @param int
* @param int
* @param string
* @return null
*/
function textarea($name, $value, $rows = 10, $cols = 80) {
	echo "<textarea name='$name' rows='$rows' cols='$cols' class='sqlarea' spellcheck='false' wrap='off' onkeydown='return textareaKeydown(this, event);'>"; // spellcheck, wrap - not valid before HTML5
	if (is_array($value)) {
		foreach ($value as $val) { // not implode() to save memory
			echo h($val[0]) . "\n\n\n"; // $val == array($query, $time)
		}
	} else {
		echo h($value);
	}
	echo "</textarea>";
}

/** Print table columns for type edit
* @param string
* @param array
* @param array
* @param array returned by referencable_primary()
* @return null
*/
function edit_type($key, $field, $collations, $foreign_keys = array()) {
	global $structured_types, $types, $unsigned, $on_actions;
	?>
<td><select name="<?php echo $key; ?>[type]" class="type" onfocus="lastType = selectValue(this);" onchange="editingTypeChange(this);"><?php echo optionlist((!$field["type"] || isset($types[$field["type"]]) ? array() : array($field["type"])) + $structured_types + ($foreign_keys ? array(lang(90) => $foreign_keys) : array()), $field["type"]); ?></select>
<td><input name="<?php echo $key; ?>[length]" value="<?php echo h($field["length"]); ?>" size="3" onfocus="editingLengthFocus(this);"><td class="options"><?php //! type="number" with enabled JavaScript
	echo "<select name='$key" . "[collation]'" . (ereg('(char|text|enum|set)$', $field["type"]) ? "" : " class='hidden'") . '><option value="">(' . lang(91) . ')' . optionlist($collations, $field["collation"]) . '</select>';
	echo ($unsigned ? "<select name='$key" . "[unsigned]'" . (!$field["type"] || ereg('((^|[^o])int|float|double|decimal)$', $field["type"]) ? "" : " class='hidden'") . '><option>' . optionlist($unsigned, $field["unsigned"]) . '</select>' : '');
	echo (isset($field['on_update']) ? "<select name='$key" . "[on_update]'" . ($field["type"] == "timestamp" ? "" : " class='hidden'") . '>' . optionlist(array("" => "(" . lang(92) . ")", "CURRENT_TIMESTAMP"), $field["on_update"]) . '</select>' : '');
	echo ($foreign_keys ? "<select name='$key" . "[on_delete]'" . (ereg("`", $field["type"]) ? "" : " class='hidden'") . "><option value=''>(" . lang(93) . ")" . optionlist(explode("|", $on_actions), $field["on_delete"]) . "</select> " : " "); // space for IE
}

/** Filter length value including enums
* @param string
* @return string
*/
function process_length($length) {
	global $enum_length;
	return (preg_match("~^\\s*(?:$enum_length)(?:\\s*,\\s*(?:$enum_length))*\\s*\$~", $length) && preg_match_all("~$enum_length~", $length, $matches) ? implode(",", $matches[0]) : preg_replace('~[^0-9,+-]~', '', $length));
}

/** Create SQL string from field type
* @param array
* @param string
* @return string
*/
function process_type($field, $collate = "COLLATE") {
	global $unsigned;
	return " $field[type]"
		. ($field["length"] != "" ? "(" . process_length($field["length"]) . ")" : "")
		. (ereg('(^|[^o])int|float|double|decimal', $field["type"]) && in_array($field["unsigned"], $unsigned) ? " $field[unsigned]" : "")
		. (ereg('char|text|enum|set', $field["type"]) && $field["collation"] ? " $collate " . q($field["collation"]) : "")
	;
}

/** Create SQL string from field
* @param array basic field information
* @param array information about field type
* @return array array("field", "type", "NULL", "DEFAULT", "ON UPDATE", "COMMENT", "AUTO_INCREMENT")
*/
function process_field($field, $type_field) {
	return array(
		idf_escape(trim($field["field"])),
		process_type($type_field),
		($field["null"] ? " NULL" : " NOT NULL"), // NULL for timestamp
		(isset($field["default"]) ? " DEFAULT " . ((ereg("time", $field["type"]) && eregi('^CURRENT_TIMESTAMP$', $field["default"])) || ($field["type"] == "bit" && ereg("^([0-9]+|b'[0-1]+')\$", $field["default"])) ? $field["default"] : q($field["default"])) : ""),
		($field["type"] == "timestamp" && $field["on_update"] ? " ON UPDATE $field[on_update]" : ""),
		(support("comment") && $field["comment"] != "" ? " COMMENT " . q($field["comment"]) : ""),
		($field["auto_increment"] ? auto_increment() : null),
	);
}

/** Get type class to use in CSS
* @param string
* @return string class=''
*/
function type_class($type) {
	foreach (array(
		'char' => 'text',
		'date' => 'time|year',
		'binary' => 'blob',
		'enum' => 'set',
	) as $key => $val) {
		if (ereg("$key|$val", $type)) {
			return " class='$key'";
		}
	}
}

/** Print table interior for fields editing
* @param array
* @param array
* @param string TABLE or PROCEDURE
* @param array returned by referencable_primary()
* @param bool display comments column
* @return null
*/
function edit_fields($fields, $collations, $type = "TABLE", $foreign_keys = array(), $comments = false) {
	global $connection, $inout;
	?>
<thead><tr class="wrap">
<?php if ($type == "PROCEDURE") { ?><td>&nbsp;<?php } ?>
<th><?php echo ($type == "TABLE" ? lang(94) : lang(95)); ?>
<td><?php echo lang(96); ?><textarea id="enum-edit" rows="4" cols="12" wrap="off" style="display: none;" onblur="editingLengthBlur(this);"></textarea>
<td><?php echo lang(97); ?>
<td><?php echo lang(98);  if ($type == "TABLE") { ?>
<td>NULL
<td><input type="radio" name="auto_increment_col" value=""><acronym title="<?php echo lang(99); ?>">AI</acronym>
<td><?php echo lang(100);  echo (support("comment") ? "<td" . ($comments ? "" : " class='hidden'") . ">" . lang(101) : "");  } ?>
<td><?php echo "<input type='image' class='icon' name='add[" . (support("move_col") ? 0 : count($fields)) . "]' src='" . h(preg_replace("~\\?.*~", "", ME)) . "?file=plus.gif&amp;version=3.7.1' alt='+' title='" . lang(102) . "'>"; ?><script type="text/javascript">row_count = <?php echo count($fields); ?>;</script>
</thead>
<tbody onkeydown="return editingKeydown(event);">
<?php
	foreach ($fields as $i => $field) {
		$i++;
		$orig = $field[($_POST ? "orig" : "field")];
		$display = (isset($_POST["add"][$i-1]) || (isset($field["field"]) && !$_POST["drop_col"][$i])) && (support("drop_col") || $orig == "");
		?>
<tr<?php echo ($display ? "" : " style='display: none;'"); ?>>
<?php echo ($type == "PROCEDURE" ? "<td>" . html_select("fields[$i][inout]", explode("|", $inout), $field["inout"]) : ""); ?>
<th><?php if ($display) { ?><input name="fields[<?php echo $i; ?>][field]" value="<?php echo h($field["field"]); ?>" onchange="<?php echo ($field["field"] != "" || count($fields) > 1 ? "" : "editingAddRow(this); "); ?>editingNameChange(this);" maxlength="64" autocapitalize="off"><?php } ?><input type="hidden" name="fields[<?php echo $i; ?>][orig]" value="<?php echo h($orig); ?>">
<?php edit_type("fields[$i]", $field, $collations, $foreign_keys);  if ($type == "TABLE") { ?>
<td><?php echo checkbox("fields[$i][null]", 1, $field["null"], "", "", "block"); ?>
<td><label class="block"><input type="radio" name="auto_increment_col" value="<?php echo $i; ?>"<?php if ($field["auto_increment"]) { ?> checked<?php } ?> onclick="var field = this.form['fields[' + this.value + '][field]']; if (!field.value) { field.value = 'id'; field.onchange(); }"></label><td><?php
echo checkbox("fields[$i][has_default]", 1, $field["has_default"]); ?><input name="fields[<?php echo $i; ?>][default]" value="<?php echo h($field["default"]); ?>" onchange="this.previousSibling.checked = true;">
<?php echo (support("comment") ? "<td" . ($comments ? "" : " class='hidden'") . "><input name='fields[$i][comment]' value='" . h($field["comment"]) . "' maxlength='" . ($connection->server_info >= 5.5 ? 1024 : 255) . "'>" : "");  } 
		echo "<td>";
		echo (support("move_col") ?
			"<input type='image' class='icon' name='add[$i]' src='" . h(preg_replace("~\\?.*~", "", ME)) . "?file=plus.gif&amp;version=3.7.1' alt='+' title='" . lang(102) . "' onclick='return !editingAddRow(this, 1);'>&nbsp;"
			. "<input type='image' class='icon' name='up[$i]' src='" . h(preg_replace("~\\?.*~", "", ME)) . "?file=up.gif&amp;version=3.7.1' alt='^' title='" . lang(103) . "'>&nbsp;"
			. "<input type='image' class='icon' name='down[$i]' src='" . h(preg_replace("~\\?.*~", "", ME)) . "?file=down.gif&amp;version=3.7.1' alt='v' title='" . lang(104) . "'>&nbsp;"
		: "");
		echo ($orig == "" || support("drop_col") ? "<input type='image' class='icon' name='drop_col[$i]' src='" . h(preg_replace("~\\?.*~", "", ME)) . "?file=cross.gif&amp;version=3.7.1' alt='x' title='" . lang(105) . "' onclick='return !editingRemoveRow(this);'>" : "");
		echo "\n";
	}
}

/** Move fields up and down or add field
* @param array
* @return bool
*/
function process_fields(&$fields) {
	ksort($fields);
	$offset = 0;
	if ($_POST["up"]) {
		$last = 0;
		foreach ($fields as $key => $field) {
			if (key($_POST["up"]) == $key) {
				unset($fields[$key]);
				array_splice($fields, $last, 0, array($field));
				break;
			}
			if (isset($field["field"])) {
				$last = $offset;
			}
			$offset++;
		}
	} elseif ($_POST["down"]) {
		$found = false;
		foreach ($fields as $key => $field) {
			if (isset($field["field"]) && $found) {
				unset($fields[key($_POST["down"])]);
				array_splice($fields, $offset, 0, array($found));
				break;
			}
			if (key($_POST["down"]) == $key) {
				$found = $field;
			}
			$offset++;
		}
	} elseif ($_POST["add"]) {
		$fields = array_values($fields);
		array_splice($fields, key($_POST["add"]), 0, array(array()));
	} elseif (!$_POST["drop_col"]) {
		return false;
	}
	return true;
}

/** Callback used in routine()
* @param array
* @return string
*/
function normalize_enum($match) {
	return "'" . str_replace("'", "''", addcslashes(stripcslashes(str_replace($match[0][0] . $match[0][0], $match[0][0], substr($match[0], 1, -1))), '\\')) . "'";
}

/** Issue grant or revoke commands
* @param string GRANT or REVOKE
* @param array
* @param string
* @param string
* @return bool
*/
function grant($grant, $privileges, $columns, $on) {
	if (!$privileges) {
		return true;
	}
	if ($privileges == array("ALL PRIVILEGES", "GRANT OPTION")) {
		// can't be granted or revoked together
		return ($grant == "GRANT"
			? queries("$grant ALL PRIVILEGES$on WITH GRANT OPTION")
			: queries("$grant ALL PRIVILEGES$on") && queries("$grant GRANT OPTION$on")
		);
	}
	return queries("$grant " . preg_replace('~(GRANT OPTION)\\([^)]*\\)~', '\\1', implode("$columns, ", $privileges) . $columns) . $on);
}

/** Drop old object and create a new one
* @param string drop old object query
* @param string create new object query
* @param string drop new object query
* @param string create test object query
* @param string drop test object query
* @param string
* @param string
* @param string
* @param string
* @param string
* @param string
* @return null redirect in success
*/
function drop_create($drop, $create, $drop_created, $test, $drop_test, $location, $message_drop, $message_alter, $message_create, $old_name, $new_name) {
	if ($_POST["drop"]) {
		query_redirect($drop, $location, $message_drop);
	} elseif ($old_name == "") {
		query_redirect($create, $location, $message_create);
	} elseif ($old_name != $new_name) {
		$created = queries($create);
		queries_redirect($location, $message_alter, $created && queries($drop));
		if ($created) {
			queries($drop_created);
		}
	} else {
		queries_redirect(
			$location,
			$message_alter,
			queries($test) && queries($drop_test) && queries($drop) && queries($create)
		);
	}
}

/** Generate SQL query for creating trigger
* @param string
* @param array result of trigger()
* @return string
*/
function create_trigger($on, $row) {
	global $jush;
	$timing_event = " $row[Timing] $row[Event]";
	return "CREATE TRIGGER "
		. idf_escape($row["Trigger"])
		. ($jush == "mssql" ? $on . $timing_event : $timing_event . $on)
		. rtrim(" $row[Type]\n$row[Statement]", ";")
		. ";"
	;
}

/** Generate SQL query for creating routine
* @param string "PROCEDURE" or "FUNCTION"
* @param array result of routine()
* @return string
*/
function create_routine($routine, $row) {
	global $inout;
	$set = array();
	$fields = (array) $row["fields"];
	ksort($fields); // enforce fields order
	foreach ($fields as $field) {
		if ($field["field"] != "") {
			$set[] = (ereg("^($inout)\$", $field["inout"]) ? "$field[inout] " : "") . idf_escape($field["field"]) . process_type($field, "CHARACTER SET");
		}
	}
	return "CREATE $routine "
		. idf_escape(trim($row["name"]))
		. " (" . implode(", ", $set) . ")"
		. (isset($_GET["function"]) ? " RETURNS" . process_type($row["returns"], "CHARACTER SET") : "")
		. ($row["language"] ? " LANGUAGE $row[language]" : "")
		. rtrim("\n$row[definition]", ";")
		. ";"
	;
}

/** Remove current user definer from SQL command
 * @param string
 * @return string
 */
function remove_definer($query) {
	return preg_replace('~^([A-Z =]+) DEFINER=`' . preg_replace('~@(.*)~', '`@`(%|\\1)', logged_user()) . '`~', '\\1', $query); //! proper escaping of user
}

/** Add a file to TAR
* @param string
* @param TmpFile
* @return null prints the output
*/
function tar_file($filename, $tmp_file) {
	$return = pack("a100a8a8a8a12a12", $filename, 644, 0, 0, decoct($tmp_file->size), decoct(time()));
	$checksum = 8*32; // space for checksum itself
	for ($i=0; $i < strlen($return); $i++) {
		$checksum += ord($return[$i]);
	}
	$return .= sprintf("%06o", $checksum) . "\0 ";
	echo $return;
	echo str_repeat("\0", 512 - strlen($return));
	$tmp_file->send();
	echo str_repeat("\0", 511 - ($tmp_file->size + 511) % 512);
}

/** Get INI bytes value
* @param string
* @return int
*/
function ini_bytes($ini) {
	$val = ini_get($ini);
	switch (strtolower(substr($val, -1))) {
		case 'g': $val *= 1024; // no break
		case 'm': $val *= 1024; // no break
		case 'k': $val *= 1024;
	}
	return $val;
}


$on_actions = "RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT"; ///< @var string used in foreign_keys()



class TmpFile {
	var $handler;
	var $size;
	
	function TmpFile() {
		$this->handler = tmpfile();
	}
	
	function write($contents) {
		$this->size += strlen($contents);
		fwrite($this->handler, $contents);
	}
	
	function send() {
		fseek($this->handler, 0);
		fpassthru($this->handler);
		fclose($this->handler);
	}
	
}


$enum_length = "'(?:''|[^'\\\\]|\\\\.)*+'";
$inout = "IN|OUT|INOUT";

if (isset($_GET["select"]) && ($_POST["edit"] || $_POST["clone"]) && !$_POST["save"]) {
	$_GET["edit"] = $_GET["select"];
}
if (isset($_GET["callf"])) {
	$_GET["call"] = $_GET["callf"];
}
if (isset($_GET["function"])) {
	$_GET["procedure"] = $_GET["function"];
}

if (isset($_GET["download"])) {
	
$TABLE = $_GET["download"];
$fields = fields($TABLE);
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=" . friendly_url("$TABLE-" . implode("_", $_GET["where"])) . "." . friendly_url($_GET["field"]));
echo $connection->result("SELECT" . limit(idf_escape($_GET["field"]) . " FROM " . table($TABLE), " WHERE " . where($_GET, $fields), 1));
exit; // don't output footer

} elseif (isset($_GET["table"])) {
	
$TABLE = $_GET["table"];
$fields = fields($TABLE);
if (!$fields) {
	$error = error();
}
$table_status = table_status1($TABLE, true);

page_header(($fields && is_view($table_status) ? lang(106) : lang(107)) . ": " . h($TABLE), $error);

$adminer->selectLinks($table_status);
$comment = $table_status["Comment"];
if ($comment != "") {
	echo "<p>" . lang(101) . ": " . h($comment) . "\n";
}

if ($fields) {
	echo "<table cellspacing='0'>\n";
	echo "<thead><tr><th>" . lang(108) . "<td>" . lang(96) . (support("comment") ? "<td>" . lang(101) : "") . "</thead>\n";
	foreach ($fields as $field) {
		echo "<tr" . odd() . "><th>" . h($field["field"]);
		echo "<td title='" . h($field["collation"]) . "'>" . h($field["full_type"]) . ($field["null"] ? " <i>NULL</i>" : "") . ($field["auto_increment"] ? " <i>" . lang(99) . "</i>" : "");
		echo (isset($field["default"]) ? " [<b>" . h($field["default"]) . "</b>]" : "");
		echo (support("comment") ? "<td>" . nbsp($field["comment"]) : "");
		echo "\n";
	}
	echo "</table>\n";
	
	if (!is_view($table_status)) {
		echo "<h3 id='indexes'>" . lang(109) . "</h3>\n";
		$indexes = indexes($TABLE);
		if ($indexes) {
			echo "<table cellspacing='0'>\n";
			foreach ($indexes as $name => $index) {
				ksort($index["columns"]); // enforce correct columns order
				$print = array();
				foreach ($index["columns"] as $key => $val) {
					$print[] = "<i>" . h($val) . "</i>"
						. ($index["lengths"][$key] ? "(" . $index["lengths"][$key] . ")" : "")
						. ($index["descs"][$key] ? " DESC" : "")
					;
				}
				echo "<tr title='" . h($name) . "'><th>$index[type]<td>" . implode(", ", $print) . "\n";
			}
			echo "</table>\n";
		}
		echo '<p><a href="' . h(ME) . 'indexes=' . urlencode($TABLE) . '">' . lang(110) . "</a>\n";
		
		if (fk_support($table_status)) {
			echo "<h3 id='foreign-keys'>" . lang(90) . "</h3>\n";
			$foreign_keys = foreign_keys($TABLE);
			if ($foreign_keys) {
				echo "<table cellspacing='0'>\n";
				echo "<thead><tr><th>" . lang(111) . "<td>" . lang(112) . "<td>" . lang(93) . "<td>" . lang(92) . ($jush != "sqlite" ? "<td>&nbsp;" : "") . "</thead>\n";
				foreach ($foreign_keys as $name => $foreign_key) {
					echo "<tr title='" . h($name) . "'>";
					echo "<th><i>" . implode("</i>, <i>", array_map('h', $foreign_key["source"])) . "</i>";
					echo "<td><a href='" . h($foreign_key["db"] != "" ? preg_replace('~db=[^&]*~', "db=" . urlencode($foreign_key["db"]), ME) : ($foreign_key["ns"] != "" ? preg_replace('~ns=[^&]*~', "ns=" . urlencode($foreign_key["ns"]), ME) : ME)) . "table=" . urlencode($foreign_key["table"]) . "'>"
						. ($foreign_key["db"] != "" ? "<b>" . h($foreign_key["db"]) . "</b>." : "") . ($foreign_key["ns"] != "" ? "<b>" . h($foreign_key["ns"]) . "</b>." : "") . h($foreign_key["table"])
						. "</a>"
					;
					echo "(<i>" . implode("</i>, <i>", array_map('h', $foreign_key["target"])) . "</i>)";
					echo "<td>" . nbsp($foreign_key["on_delete"]) . "\n";
					echo "<td>" . nbsp($foreign_key["on_update"]) . "\n";
					echo ($jush == "sqlite" ? "" : '<td><a href="' . h(ME . 'foreign=' . urlencode($TABLE) . '&name=' . urlencode($name)) . '">' . lang(113) . '</a>');
				}
				echo "</table>\n";
			}
			if ($jush != "sqlite") {
				echo '<p><a href="' . h(ME) . 'foreign=' . urlencode($TABLE) . '">' . lang(114) . "</a>\n";
			}
		}
		
		if (support("trigger")) {
			echo "<h3 id='triggers'>" . lang(115) . "</h3>\n";
			$triggers = triggers($TABLE);
			if ($triggers) {
				echo "<table cellspacing='0'>\n";
				foreach ($triggers as $key => $val) {
					echo "<tr valign='top'><td>$val[0]<td>$val[1]<th>" . h($key) . "<td><a href='" . h(ME . 'trigger=' . urlencode($TABLE) . '&name=' . urlencode($key)) . "'>" . lang(113) . "</a>\n";
				}
				echo "</table>\n";
			}
			echo '<p><a href="' . h(ME) . 'trigger=' . urlencode($TABLE) . '">' . lang(116) . "</a>\n";
		}
		
	}
}

} elseif (isset($_GET["schema"])) {
	
page_header(lang(53), "", array(), DB . ($_GET["ns"] ? ".$_GET[ns]" : ""));

$table_pos = array();
$table_pos_js = array();
$name = "adminer_schema";
$SCHEMA = ($_GET["schema"] ? $_GET["schema"] : $_COOKIE[($_COOKIE["$name-" . DB] ? "$name-" . DB : $name)]); // $_COOKIE["adminer_schema"] was used before 3.2.0 //! ':' in table name
preg_match_all('~([^:]+):([-0-9.]+)x([-0-9.]+)(_|$)~', $SCHEMA, $matches, PREG_SET_ORDER);
foreach ($matches as $i => $match) {
	$table_pos[$match[1]] = array($match[2], $match[3]);
	$table_pos_js[] = "\n\t'" . js_escape($match[1]) . "': [ $match[2], $match[3] ]";
}

$top = 0;
$base_left = -1;
$schema = array(); // table => array("fields" => array(name => field), "pos" => array(top, left), "references" => array(table => array(left => array(source, target))))
$referenced = array(); // target_table => array(table => array(left => target_column))
$lefts = array(); // float => bool
foreach (table_status('', true) as $table => $table_status) {
	if (is_view($table_status)) {
		continue;
	}
	$pos = 0;
	$schema[$table]["fields"] = array();
	foreach (fields($table) as $name => $field) {
		$pos += 1.25;
		$field["pos"] = $pos;
		$schema[$table]["fields"][$name] = $field;
	}
	$schema[$table]["pos"] = ($table_pos[$table] ? $table_pos[$table] : array($top, 0));
	foreach ($adminer->foreignKeys($table) as $val) {
		if (!$val["db"]) {
			$left = $base_left;
			if ($table_pos[$table][1] || $table_pos[$val["table"]][1]) {
				$left = min(floatval($table_pos[$table][1]), floatval($table_pos[$val["table"]][1])) - 1;
			} else {
				$base_left -= .1;
			}
			while ($lefts[(string) $left]) {
				// find free $left
				$left -= .0001;
			}
			$schema[$table]["references"][$val["table"]][(string) $left] = array($val["source"], $val["target"]);
			$referenced[$val["table"]][$table][(string) $left] = $val["target"];
			$lefts[(string) $left] = true;
		}
	}
	$top = max($top, $schema[$table]["pos"][0] + 2.5 + $pos);
}

?>
<div id="schema" style="height: <?php echo $top; ?>em;" onselectstart="return false;">
<script type="text/javascript">
var tablePos = {<?php echo implode(",", $table_pos_js) . "\n"; ?>};
var em = document.getElementById('schema').offsetHeight / <?php echo $top; ?>;
document.onmousemove = schemaMousemove;
document.onmouseup = function (ev) {
	schemaMouseup(ev, '<?php echo js_escape(DB); ?>');
};
</script>
<?php
foreach ($schema as $name => $table) {
	echo "<div class='table' style='top: " . $table["pos"][0] . "em; left: " . $table["pos"][1] . "em;' onmousedown='schemaMousedown(this, event);'>";
	echo '<a href="' . h(ME) . 'table=' . urlencode($name) . '"><b>' . h($name) . "</b></a>";
	
	foreach ($table["fields"] as $field) {
		$val = '<span' . type_class($field["type"]) . ' title="' . h($field["full_type"] . ($field["null"] ? " NULL" : '')) . '">' . h($field["field"]) . '</span>';
		echo "<br>" . ($field["primary"] ? "<i>$val</i>" : $val);
	}
	
	foreach ((array) $table["references"] as $target_name => $refs) {
		foreach ($refs as $left => $ref) {
			$left1 = $left - $table_pos[$name][1];
			$i = 0;
			foreach ($ref[0] as $source) {
				echo "\n<div class='references' title='" . h($target_name) . "' id='refs$left-" . ($i++) . "' style='left: $left1" . "em; top: " . $table["fields"][$source]["pos"] . "em; padding-top: .5em;'><div style='border-top: 1px solid Gray; width: " . (-$left1) . "em;'></div></div>";
			}
		}
	}
	
	foreach ((array) $referenced[$name] as $target_name => $refs) {
		foreach ($refs as $left => $columns) {
			$left1 = $left - $table_pos[$name][1];
			$i = 0;
			foreach ($columns as $target) {
				echo "\n<div class='references' title='" . h($target_name) . "' id='refd$left-" . ($i++) . "' style='left: $left1" . "em; top: " . $table["fields"][$target]["pos"] . "em; height: 1.25em; background: url(" . h(preg_replace("~\\?.*~", "", ME)) . "?file=arrow.gif) no-repeat right center;&amp;version=3.7.1'><div style='height: .5em; border-bottom: 1px solid Gray; width: " . (-$left1) . "em;'></div></div>";
			}
		}
	}
	
	echo "\n</div>\n";
}

foreach ($schema as $name => $table) {
	foreach ((array) $table["references"] as $target_name => $refs) {
		foreach ($refs as $left => $ref) {
			$min_pos = $top;
			$max_pos = -10;
			foreach ($ref[0] as $key => $source) {
				$pos1 = $table["pos"][0] + $table["fields"][$source]["pos"];
				$pos2 = $schema[$target_name]["pos"][0] + $schema[$target_name]["fields"][$ref[1][$key]]["pos"];
				$min_pos = min($min_pos, $pos1, $pos2);
				$max_pos = max($max_pos, $pos1, $pos2);
			}
			echo "<div class='references' id='refl$left' style='left: $left" . "em; top: $min_pos" . "em; padding: .5em 0;'><div style='border-right: 1px solid Gray; margin-top: 1px; height: " . ($max_pos - $min_pos) . "em;'></div></div>\n";
		}
	}
}
?>
</div>
<p><a href="<?php echo h(ME . "schema=" . urlencode($SCHEMA)); ?>" id="schema-link"><?php echo lang(117); ?></a>
<?php
} elseif (isset($_GET["dump"])) {
	
$TABLE = $_GET["dump"];

if ($_POST && !$error) {
	$cookie = "";
	foreach (array("output", "format", "db_style", "routines", "events", "table_style", "auto_increment", "triggers", "data_style") as $key) {
		$cookie .= "&$key=" . urlencode($_POST[$key]);
	}
	cookie("adminer_export", substr($cookie, 1));
	$tables = array_flip((array) $_POST["tables"]) + array_flip((array) $_POST["data"]);
	$ext = dump_headers(
		(count($tables) == 1 ? key($tables) : DB),
		(DB == "" || count($tables) > 1));
	$is_sql = ereg('sql', $_POST["format"]);
	
	if ($is_sql) {
		echo "-- Adminer $VERSION " . $drivers[DRIVER] . " dump

" . ($jush != "sql" ? "" : "SET NAMES utf8;
" . ($_POST["data_style"] ? "SET foreign_key_checks = 0;
SET time_zone = " . q(substr(preg_replace('~^[^-]~', '+\0', $connection->result("SELECT TIMEDIFF(NOW(), UTC_TIMESTAMP)")), 0, 6)) . ";
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
" : "") . "
");
	}
	
	$style = $_POST["db_style"];
	$databases = array(DB);
	if (DB == "") {
		$databases = $_POST["databases"];
		if (is_string($databases)) {
			$databases = explode("\n", rtrim(str_replace("\r", "", $databases), "\n"));
		}
	}
	
	foreach ((array) $databases as $db) {
		$adminer->dumpDatabase($db);
		if ($connection->select_db($db)) {
			if ($is_sql && ereg('CREATE', $style) && ($create = $connection->result("SHOW CREATE DATABASE " . idf_escape($db), 1))) {
				if ($style == "DROP+CREATE") {
					echo "DROP DATABASE IF EXISTS " . idf_escape($db) . ";\n";
				}
				echo "$create;\n";
			}
			if ($is_sql) {
				if ($style) {
					echo use_sql($db) . ";\n\n";
				}
				$out = "";
				
				if ($_POST["routines"]) {
					foreach (array("FUNCTION", "PROCEDURE") as $routine) {
						foreach (get_rows("SHOW $routine STATUS WHERE Db = " . q($db), null, "-- ") as $row) {
							$out .= ($style != 'DROP+CREATE' ? "DROP $routine IF EXISTS " . idf_escape($row["Name"]) . ";;\n" : "")
							. remove_definer($connection->result("SHOW CREATE $routine " . idf_escape($row["Name"]), 2)) . ";;\n\n";
						}
					}
				}
				
				if ($_POST["events"]) {
					foreach (get_rows("SHOW EVENTS", null, "-- ") as $row) {
						$out .= ($style != 'DROP+CREATE' ? "DROP EVENT IF EXISTS " . idf_escape($row["Name"]) . ";;\n" : "")
						. remove_definer($connection->result("SHOW CREATE EVENT " . idf_escape($row["Name"]), 3)) . ";;\n\n";
					}
				}
				
				if ($out) {
					echo "DELIMITER ;;\n\n$out" . "DELIMITER ;\n\n";
				}
			}
			
			if ($_POST["table_style"] || $_POST["data_style"]) {
				$views = array();
				foreach (table_status('', true) as $name => $table_status) {
					$table = (DB == "" || in_array($name, (array) $_POST["tables"]));
					$data = (DB == "" || in_array($name, (array) $_POST["data"]));
					if ($table || $data) {
						if ($ext == "tar") {
							$tmp_file = new TmpFile;
							ob_start(array($tmp_file, 'write'), 1e5);
						}
						
						$adminer->dumpTable($name, ($table ? $_POST["table_style"] : ""), (is_view($table_status) ? 2 : 0));
						if (is_view($table_status)) {
							$views[] = $name;
						} elseif ($data) {
							$fields = fields($name);
							$adminer->dumpData($name, $_POST["data_style"], "SELECT *" . convert_fields($fields, $fields) . " FROM " . table($name));
						}
						if ($is_sql && $_POST["triggers"] && $table && ($triggers = trigger_sql($name, $_POST["table_style"]))) {
							echo "\nDELIMITER ;;\n$triggers\nDELIMITER ;\n";
						}
						
						if ($ext == "tar") {
							ob_end_flush();
							tar_file((DB != "" ? "" : "$db/") . "$name.csv", $tmp_file);
						} elseif ($is_sql) {
							echo "\n";
						}
					}
				}
				
				foreach ($views as $view) {
					$adminer->dumpTable($view, $_POST["table_style"], 1);
				}
				
				if ($ext == "tar") {
					echo pack("x512");
				}
			}
		}
	}
	
	if ($is_sql) {
		echo "-- " . $connection->result("SELECT NOW()") . "\n";
	}
	exit;
}

page_header(lang(118), $error, ($_GET["export"] != "" ? array("table" => $_GET["export"]) : array()), DB);
?>

<form action="" method="post">
<table cellspacing="0">
<?php
$db_style = array('', 'USE', 'DROP+CREATE', 'CREATE');
$table_style = array('', 'DROP+CREATE', 'CREATE');
$data_style = array('', 'TRUNCATE+INSERT', 'INSERT');
if ($jush == "sql") { //! use insert_update() in all drivers
	$data_style[] = 'INSERT+UPDATE';
}
parse_str($_COOKIE["adminer_export"], $row);
if (!$row) {
	$row = array("output" => "text", "format" => "sql", "db_style" => (DB != "" ? "" : "CREATE"), "table_style" => "DROP+CREATE", "data_style" => "INSERT");
}
if (!isset($row["events"])) { // backwards compatibility
	$row["routines"] = $row["events"] = ($_GET["dump"] == "");
	$row["triggers"] = $row["table_style"];
}

echo "<tr><th>" . lang(119) . "<td>" . html_select("output", $adminer->dumpOutput(), $row["output"], 0) . "\n"; // 0 - radio

echo "<tr><th>" . lang(120) . "<td>" . html_select("format", $adminer->dumpFormat(), $row["format"], 0) . "\n"; // 0 - radio

echo ($jush == "sqlite" ? "" : "<tr><th>" . lang(25) . "<td>" . html_select('db_style', $db_style, $row["db_style"])
	. (support("routine") ? checkbox("routines", 1, $row["routines"], lang(121)) : "")
	. (support("event") ? checkbox("events", 1, $row["events"], lang(122)) : "")
);

echo "<tr><th>" . lang(85) . "<td>" . html_select('table_style', $table_style, $row["table_style"])
	. checkbox("auto_increment", 1, $row["auto_increment"], lang(99))
	. (support("trigger") ? checkbox("triggers", 1, $row["triggers"], lang(115)) : "")
;

echo "<tr><th>" . lang(123) . "<td>" . html_select('data_style', $data_style, $row["data_style"]);
?>
</table>
<p><input type="submit" value="<?php echo lang(118); ?>">
<input type="hidden" name="token" value="<?php echo $token; ?>">

<table cellspacing="0">
<?php
$prefixes = array();
if (DB != "") {
	$checked = ($TABLE != "" ? "" : " checked");
	echo "<thead><tr>";
	echo "<th style='text-align: left;'><label class='block'><input type='checkbox' id='check-tables'$checked onclick='formCheck(this, /^tables\\[/);'>" . lang(85) . "</label>";
	echo "<th style='text-align: right;'><label class='block'>" . lang(123) . "<input type='checkbox' id='check-data'$checked onclick='formCheck(this, /^data\\[/);'></label>";
	echo "</thead>\n";
	
	$views = "";
	$tables_list = tables_list();
	foreach ($tables_list as $name => $type) {
		$prefix = ereg_replace("_.*", "", $name);
		$checked = ($TABLE == "" || $TABLE == (substr($TABLE, -1) == "%" ? "$prefix%" : $name)); //! % may be part of table name
		$print = "<tr><td>" . checkbox("tables[]", $name, $checked, $name, "checkboxClick(event, this); formUncheck('check-tables');", "block");
		if ($type !== null && !eregi("table", $type)) {
			$views .= "$print\n";
		} else {
			echo "$print<td align='right'><label class='block'><span id='Rows-" . h($name) . "'></span>" . checkbox("data[]", $name, $checked, "", "checkboxClick(event, this); formUncheck('check-data');") . "</label>\n";
		}
		$prefixes[$prefix]++;
	}
	echo $views;
	
	if ($tables_list) {
		echo "<script type='text/javascript'>ajaxSetHtml('" . js_escape(ME) . "script=db');</script>\n";
	}
	
} else {
	echo "<thead><tr><th style='text-align: left;'><label class='block'><input type='checkbox' id='check-databases'" . ($TABLE == "" ? " checked" : "") . " onclick='formCheck(this, /^databases\\[/);'>" . lang(25) . "</label></thead>\n";
	$databases = $adminer->databases();
	if ($databases) {
		foreach ($databases as $db) {
			if (!information_schema($db)) {
				$prefix = ereg_replace("_.*", "", $db);
				echo "<tr><td>" . checkbox("databases[]", $db, $TABLE == "" || $TABLE == "$prefix%", $db, "formUncheck('check-databases');", "block") . "\n";
				$prefixes[$prefix]++;
			}
		}
	} else {
		echo "<tr><td><textarea name='databases' rows='10' cols='20'></textarea>";
	}
}
?>
</table>
</form>
<?php
$first = true;
foreach ($prefixes as $key => $val) {
	if ($key != "" && $val > 1) {
		echo ($first ? "<p>" : " ") . "<a href='" . h(ME) . "dump=" . urlencode("$key%") . "'>" . h($key) . "</a>";
		$first = false;
	}
}

} elseif (isset($_GET["privileges"])) {
	
page_header(lang(54));

$result = $connection->query("SELECT User, Host FROM mysql." . (DB == "" ? "user" : "db WHERE " . q(DB) . " LIKE Db") . " ORDER BY Host, User");
$grant = $result;
if (!$result) {
	// list logged user, information_schema.USER_PRIVILEGES lists just the current user too
	$result = $connection->query("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1) AS User, SUBSTRING_INDEX(CURRENT_USER, '@', -1) AS Host");
}

echo "<form action=''><p>\n";
hidden_fields_get();
echo "<input type='hidden' name='db' value='" . h(DB) . "'>\n";
echo ($grant ? "" : "<input type='hidden' name='grant' value=''>\n");
echo "<table cellspacing='0'>\n";
echo "<thead><tr><th>" . lang(23) . "<th>" . lang(22) . "<th>&nbsp;</thead>\n";

while ($row = $result->fetch_assoc()) {
	echo '<tr' . odd() . '><td>' . h($row["User"]) . "<td>" . h($row["Host"]) . '<td><a href="' . h(ME . 'user=' . urlencode($row["User"]) . '&host=' . urlencode($row["Host"])) . '">' . lang(34) . "</a>\n";
}

if (!$grant || DB != "") {
	echo "<tr" . odd() . "><td><input name='user' autocapitalize='off'><td><input name='host' value='localhost' autocapitalize='off'><td><input type='submit' value='" . lang(34) . "'>\n";
}

echo "</table>\n";
echo "</form>\n";

echo '<p><a href="' . h(ME) . 'user=">' . lang(124) . "</a>";

} elseif (isset($_GET["sql"])) {
	
if (!$error && $_POST["export"]) {
	dump_headers("sql");
	$adminer->dumpTable("", "");
	$adminer->dumpData("", "table", $_POST["query"]);
	exit;
}

restart_session();
$history_all = &get_session("queries");
$history = &$history_all[DB];
if (!$error && $_POST["clear"]) {
	$history = array();
	redirect(remove_from_uri("history"));
}

page_header(lang(47), $error);

if (!$error && $_POST) {
	$fp = false;
	$query = $_POST["query"];
	if ($_POST["webfile"]) {
		$fp = @fopen((file_exists("adminer.sql")
			? "adminer.sql"
			: "compress.zlib://adminer.sql.gz"
		), "rb");
		$query = ($fp ? fread($fp, 1e6) : false);
	} elseif ($_FILES && $_FILES["sql_file"]["error"][0] != 4) { // 4 - UPLOAD_ERR_NO_FILE
		$query = get_file("sql_file", true);
	}
	
	if (is_string($query)) { // get_file() returns error as number, fread() as false
		if (function_exists('memory_get_usage')) {
			@ini_set("memory_limit", max(ini_bytes("memory_limit"), 2 * strlen($query) + memory_get_usage() + 8e6)); // @ - may be disabled, 2 - substr and trim, 8e6 - other variables
		}
		
		if ($query != "" && strlen($query) < 1e6) { // don't add big queries
			$q = $query . (ereg(";[ \t\r\n]*\$", $query) ? "" : ";"); //! doesn't work with DELIMITER |
			if (!$history || reset(end($history)) != $q) { // no repeated queries
				restart_session();
				$history[] = array($q, time());
				set_session("queries", $history_all); // required because reference is unlinked by stop_session()
				stop_session();
			}
		}
		
		$space = "(?:\\s|/\\*.*\\*/|(?:#|-- )[^\n]*\n|--\n)";
		$delimiter = ";";
		$offset = 0;
		$empty = true;
		$connection2 = connect(); // connection for exploring indexes and EXPLAIN (to not replace FOUND_ROWS()) //! PDO - silent error
		if (is_object($connection2) && DB != "") {
			$connection2->select_db(DB);
		}
		$commands = 0;
		$errors = array();
		$line = 0;
		$parse = '[\'"' . ($jush == "sql" ? '`#' : ($jush == "sqlite" ? '`[' : ($jush == "mssql" ? '[' : ''))) . ']|/\\*|-- |$' . ($jush == "pgsql" ? '|\\$[^$]*\\$' : '');
		$total_start = microtime();
		parse_str($_COOKIE["adminer_export"], $adminer_export);
		$dump_format = $adminer->dumpFormat();
		unset($dump_format["sql"]);
		
		while ($query != "") {
			if (!$offset && preg_match("~^$space*DELIMITER\\s+(\\S+)~i", $query, $match)) {
				$delimiter = $match[1];
				$query = substr($query, strlen($match[0]));
			} else {
				preg_match('(' . preg_quote($delimiter) . "\\s*|$parse)", $query, $match, PREG_OFFSET_CAPTURE, $offset); // should always match
				list($found, $pos) = $match[0];
				if (!$found && $fp && !feof($fp)) {
					$query .= fread($fp, 1e5);
				} else {
					if (!$found && rtrim($query) == "") {
						break;
					}
					$offset = $pos + strlen($found);
					
					if ($found && rtrim($found) != $delimiter) { // find matching quote or comment end
						while (preg_match('(' . ($found == '/*' ? '\\*/' : ($found == '[' ? ']' : (ereg('^-- |^#', $found) ? "\n" : preg_quote($found) . "|\\\\."))) . '|$)s', $query, $match, PREG_OFFSET_CAPTURE, $offset)) { //! respect sql_mode NO_BACKSLASH_ESCAPES
							$s = $match[0][0];
							if (!$s && $fp && !feof($fp)) {
								$query .= fread($fp, 1e5);
							} else {
								$offset = $match[0][1] + strlen($s);
								if ($s[0] != "\\") {
									break;
								}
							}
						}
						
					} else { // end of a query
						$empty = false;
						$q = substr($query, 0, $pos);
						$commands++;
						$print = "<pre id='sql-$commands'><code class='jush-$jush'>" . shorten_utf8(trim($q), 1000) . "</code></pre>\n";
						if (!$_POST["only_errors"]) {
							echo $print;
							ob_flush();
							flush(); // can take a long time - show the running query
						}
						$start = microtime(); // microtime(true) is available since PHP 5
						//! don't allow changing of character_set_results, convert encoding of displayed query
						if ($connection->multi_query($q) && is_object($connection2) && preg_match("~^$space*USE\\b~isU", $q)) {
							$connection2->query($q);
						}
						
						do {
							$result = $connection->store_result();
							$end = microtime();
							$time = " <span class='time'>(" . format_time($start, $end) . ")</span>"
								. (strlen($q) < 1000 ? " <a href='" . h(ME) . "sql=" . urlencode(trim($q)) . "'>" . lang(34) . "</a>" : "") // 1000 - maximum length of encoded URL in IE is 2083 characters
							;
							
							if ($connection->error) {
								echo ($_POST["only_errors"] ? $print : "");
								echo "<p class='error'>" . lang(125) . ($connection->errno ? " ($connection->errno)" : "") . ": " . error() . "\n";
								$errors[] = " <a href='#sql-$commands'>$commands</a>";
								if ($_POST["error_stops"]) {
									break 2;
								}
								
							} elseif (is_object($result)) {
								$orgtables = select($result, $connection2);
								if (!$_POST["only_errors"]) {
									echo "<form action='' method='post'>\n";
									echo "<p>" . ($result->num_rows ? lang(126, $result->num_rows) : "") . $time;
									$id = "export-$commands";
									$export = ", <a href='#$id' onclick=\"return !toggle('$id');\">" . lang(118) . "</a><span id='$id' class='hidden'>: "
										. html_select("output", $adminer->dumpOutput(), $adminer_export["output"]) . " "
										. html_select("format", $dump_format, $adminer_export["format"])
										. "<input type='hidden' name='query' value='" . h($q) . "'>"
										. " <input type='submit' name='export' value='" . lang(118) . "'><input type='hidden' name='token' value='$token'></span>\n"
									;
									if ($connection2 && preg_match("~^($space|\\()*SELECT\\b~isU", $q) && ($explain = explain($connection2, $q))) {
										$id = "explain-$commands";
										echo ", <a href='#$id' onclick=\"return !toggle('$id');\">EXPLAIN</a>$export";
										echo "<div id='$id' class='hidden'>\n";
										select($explain, $connection2, ($jush == "sql" ? "http://dev.mysql.com/doc/refman/" . substr($connection->server_info, 0, 3) . "/en/explain-output.html#explain_" : ""), $orgtables);
										echo "</div>\n";
									} else {
										echo $export;
									}
									echo "</form>\n";
								}
								
							} else {
								if (preg_match("~^$space*(CREATE|DROP|ALTER)$space+(DATABASE|SCHEMA)\\b~isU", $q)) {
									restart_session();
									set_session("dbs", null); // clear cache
									stop_session();
								}
								if (!$_POST["only_errors"]) {
									echo "<p class='message' title='" . h($connection->info) . "'>" . lang(127, $connection->affected_rows) . "$time\n";
								}
							}
							
							$start = $end;
						} while ($connection->next_result());
						
						$line += substr_count($q.$found, "\n");
						$query = substr($query, $offset);
						$offset = 0;
					}
					
				}
			}
		}
		
		if ($empty) {
			echo "<p class='message'>" . lang(128) . "\n";
		} elseif ($_POST["only_errors"]) {
			echo "<p class='message'>" . lang(129, $commands - count($errors));
			echo " <span class='time'>(" . format_time($total_start, microtime()) . ")</span>\n";
		} elseif ($errors && $commands > 1) {
			echo "<p class='error'>" . lang(125) . ": " . implode("", $errors) . "\n";
		}
		//! MS SQL - SET SHOWPLAN_ALL OFF
		
	} else {
		echo "<p class='error'>" . upload_error($query) . "\n";
	}
}
?>

<form action="" method="post" enctype="multipart/form-data" id="form">
<p><?php
$q = $_GET["sql"]; // overwrite $q from if ($_POST) to save memory
if ($_POST) {
	$q = $_POST["query"];
} elseif ($_GET["history"] == "all") {
	$q = $history;
} elseif ($_GET["history"] != "") {
	$q = $history[$_GET["history"]][0];
}
textarea("query", $q, 20);

echo ($_POST ? "" : "<script type='text/javascript'>focus(document.getElementsByTagName('textarea')[0]);</script>\n");
echo "<p>" . (ini_bool("file_uploads")
	? lang(130) . ': <input type="file" name="sql_file[]" multiple'
		. ($_FILES && $_FILES["sql_file"]["error"][0] != 4 ? '' : ' onchange="this.form[\'only_errors\'].checked = true;"') // 4 - UPLOAD_ERR_NO_FILE
		. '> (&lt; ' . ini_get("upload_max_filesize") . 'B)' // ignore post_max_size because it is for all form fields together and bytes computing would be necessary
	: lang(131)
);

?>
<p>
<input type="submit" value="<?php echo lang(33); ?>" title="Ctrl+Enter">
<?php
echo checkbox("error_stops", 1, $_POST["error_stops"], lang(132)) . "\n";
echo checkbox("only_errors", 1, $_POST["only_errors"], lang(133)) . "\n";

print_fieldset("webfile", lang(134), $_POST["webfile"], "document.getElementById('form')['only_errors'].checked = true; ");
echo lang(135, "<code>adminer.sql" . (extension_loaded("zlib") ? "[.gz]" : "") . "</code>");
echo ' <input type="submit" name="webfile" value="' . lang(136) . '">';
echo "</div></fieldset>\n";

if ($history) {
	print_fieldset("history", lang(137), $_GET["history"] != "");
	for ($val = end($history); $val; $val = prev($history)) { // not array_reverse() to save memory
		$key = key($history);
		list($q, $time) = $val;
		echo '<a href="' . h(ME . "sql=&history=$key") . '">' . lang(34) . "</a> <span class='time' title='" . @date('Y-m-d', $time) . "'>" . @date("H:i:s", $time) . "</span> <code class='jush-$jush'>" . shorten_utf8(ltrim(str_replace("\n", " ", str_replace("\r", "", preg_replace('~^(#|-- ).*~m', '', $q)))), 80, "</code>") . "<br>\n"; // @ - time zone may be not set
	}
	echo "<input type='submit' name='clear' value='" . lang(138) . "'>\n";
	echo "<a href='" . h(ME . "sql=&history=all") . "'>" . lang(139) . "</a>\n";
	echo "</div></fieldset>\n";
}
?>
<input type="hidden" name="token" value="<?php echo $token; ?>">
</form>
<?php
} elseif (isset($_GET["edit"])) {
	
$TABLE = $_GET["edit"];
$fields = fields($TABLE);
$where = (isset($_GET["select"]) ? (count($_POST["check"]) == 1 ? where_check($_POST["check"][0], $fields) : "") : where($_GET, $fields));
$update = (isset($_GET["select"]) ? $_POST["edit"] : $where);
foreach ($fields as $name => $field) {
	if (!isset($field["privileges"][$update ? "update" : "insert"]) || $adminer->fieldName($field) == "") {
		unset($fields[$name]);
	}
}

if ($_POST && !$error && !isset($_GET["select"])) {
	$location = $_POST["referer"];
	if ($_POST["insert"]) { // continue edit or insert
		$location = ($update ? null : $_SERVER["REQUEST_URI"]);
	} elseif (!ereg('^.+&select=.+$', $location)) {
		$location = ME . "select=" . urlencode($TABLE);
	}
	
	$indexes = indexes($TABLE);
	$unique_array = unique_array($_GET["where"], $indexes);
	$query_where = "\nWHERE $where";
	
	if (isset($_POST["delete"])) {
		$query = "FROM " . table($TABLE);
		query_redirect(
			"DELETE" . ($unique_array ? " $query$query_where" : limit1($query, $query_where)),
			$location,
			lang(140)
		);
	} else {
		$set = array();
		foreach ($fields as $name => $field) {
			$val = process_input($field);
			if ($val !== false && $val !== null) {
				$set[idf_escape($name)] = ($update ? "\n" . idf_escape($name) . " = $val" : $val);
			}
		}
		
		if ($update) {
			if (!$set) {
				redirect($location);
			}
			$query = table($TABLE) . " SET" . implode(",", $set);
			query_redirect(
				"UPDATE" . ($unique_array ? " $query$query_where" : limit1($query, $query_where)),
				$location,
				lang(141)
			);
		} else {
			$result = insert_into($TABLE, $set);
			$last_id = ($result ? last_id() : 0);
			queries_redirect($location, lang(142, ($last_id ? " $last_id" : "")), $result); //! link
		}
	}
}

$table_name = $adminer->tableName(table_status1($TABLE, true));
page_header(
	($update ? lang(34) : lang(143)),
	$error,
	array("select" => array($TABLE, $table_name)),
	$table_name //! two calls of h()
);

$row = null;
if ($_POST["save"]) {
	$row = (array) $_POST["fields"];
} elseif ($where) {
	$select = array();
	foreach ($fields as $name => $field) {
		if (isset($field["privileges"]["select"])) {
			$as = convert_field($field);
			if ($_POST["clone"] && $field["auto_increment"]) {
				$as = "''";
			}
			if ($jush == "sql" && ereg("enum|set", $field["type"])) {
				$as = "1*" . idf_escape($name);
			}
			$select[] = ($as ? "$as AS " : "") . idf_escape($name);
		}
	}
	$row = array();
	if ($select) {
		$rows = get_rows("SELECT" . limit(implode(", ", $select) . " FROM " . table($TABLE), " WHERE $where", (isset($_GET["select"]) ? 2 : 1)));
		$row = (isset($_GET["select"]) && count($rows) != 1 ? null : reset($rows));
	}
}

if ($row === false) {
	echo "<p class='error'>" . lang(89) . "\n";
}
?>

<form action="" method="post" enctype="multipart/form-data" id="form">
<?php
if (!$fields) {
	echo "<p class='error'>" . lang(144) . "\n";
} else {
	echo "<table cellspacing='0' onkeydown='return editingKeydown(event);'>\n";
	
	foreach ($fields as $name => $field) {
		echo "<tr><th>" . $adminer->fieldName($field);
		$default = $_GET["set"][bracket_escape($name)];
		if ($default === null) {
			$default = $field["default"];
			if ($field["type"] == "bit" && ereg("^b'([01]*)'\$", $default, $regs)) {
				$default = $regs[1];
			}
		}
		$value = ($row !== null
			? ($row[$name] != "" && $jush == "sql" && ereg("enum|set", $field["type"]) ? (is_array($row[$name]) ? array_sum($row[$name]) : +$row[$name]) : $row[$name])
			: (!$update && $field["auto_increment"] ? "" : (isset($_GET["select"]) ? false : $default))
		);
		if (!$_POST["save"] && is_string($value)) {
			$value = $adminer->editVal($value, $field);
		}
		$function = ($_POST["save"] ? (string) $_POST["function"][$name] : ($update && $field["on_update"] == "CURRENT_TIMESTAMP" ? "now" : ($value === false ? null : ($value !== null ? '' : 'NULL'))));
		if (ereg("time", $field["type"]) && $value == "CURRENT_TIMESTAMP") {
			$value = "";
			$function = "now";
		}
		input($field, $value, $function);
		echo "\n";
	}
	
	echo "</table>\n";
}
?>
<p>
<?php
if ($fields) {
	echo "<input type='submit' value='" . lang(145) . "'>\n";
	if (!isset($_GET["select"])) {
		echo "<input type='submit' name='insert' value='" . ($update ? lang(146) : lang(147)) . "' title='Ctrl+Shift+Enter'>\n";
	}
}
echo ($update ? "<input type='submit' name='delete' value='" . lang(148) . "' onclick=\"return confirm('" . lang(0) . "');\">\n"
	: ($_POST || !$fields ? "" : "<script type='text/javascript'>focus(document.getElementById('form').getElementsByTagName('td')[1].firstChild);</script>\n")
);
if (isset($_GET["select"])) {
	hidden_fields(array("check" => (array) $_POST["check"], "clone" => $_POST["clone"], "all" => $_POST["all"]));
}
?>
<input type="hidden" name="referer" value="<?php echo h(isset($_POST["referer"]) ? $_POST["referer"] : $_SERVER["HTTP_REFERER"]); ?>">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="<?php echo $token; ?>">
</form>
<?php
} elseif (isset($_GET["create"])) {
	
$TABLE = $_GET["create"];
$partition_by = array('HASH', 'LINEAR HASH', 'KEY', 'LINEAR KEY', 'RANGE', 'LIST');

$referencable_primary = referencable_primary($TABLE);
$foreign_keys = array();
foreach ($referencable_primary as $table_name => $field) {
	$foreign_keys[str_replace("`", "``", $table_name) . "`" . str_replace("`", "``", $field["field"])] = $table_name; // not idf_escape() - used in JS
}

$orig_fields = array();
$table_status = array();
if ($TABLE != "") {
	$orig_fields = fields($TABLE);
	$table_status = table_status($TABLE);
	if (!$table_status) {
		$error = lang(7);
	}
}

$row = $_POST;
$row["fields"] = (array) $row["fields"];
if ($row["auto_increment_col"]) {
	$row["fields"][$row["auto_increment_col"]]["auto_increment"] = true;
}

if ($_POST && !process_fields($row["fields"]) && !$error) {
	if ($_POST["drop"]) {
		query_redirect("DROP TABLE " . table($TABLE), substr(ME, 0, -1), lang(149));
	} else {
		$fields = array();
		$all_fields = array();
		$use_all_fields = false;
		$foreign = array();
		ksort($row["fields"]);
		$orig_field = reset($orig_fields);
		$after = " FIRST";
		
		foreach ($row["fields"] as $key => $field) {
			$foreign_key = $foreign_keys[$field["type"]];
			$type_field = ($foreign_key !== null ? $referencable_primary[$foreign_key] : $field); //! can collide with user defined type
			if ($field["field"] != "") {
				if (!$field["has_default"]) {
					$field["default"] = null;
				}
				if ($key == $row["auto_increment_col"]) {
					$field["auto_increment"] = true;
				}
				$process_field = process_field($field, $type_field);
				$all_fields[] = array($field["orig"], $process_field, $after);
				if ($process_field != process_field($orig_field, $orig_field)) {
					$fields[] = array($field["orig"], $process_field, $after);
					if ($field["orig"] != "" || $after) {
						$use_all_fields = true;
					}
				}
				if ($foreign_key !== null) {
					$foreign[idf_escape($field["field"])] = ($TABLE != "" && $jush != "sqlite" ? "ADD" : " ") . " FOREIGN KEY (" . idf_escape($field["field"]) . ") REFERENCES " . table($foreign_keys[$field["type"]]) . " (" . idf_escape($type_field["field"]) . ")" . (ereg("^($on_actions)\$", $field["on_delete"]) ? " ON DELETE $field[on_delete]" : "");
				}
				$after = " AFTER " . idf_escape($field["field"]);
			} elseif ($field["orig"] != "") {
				$use_all_fields = true;
				$fields[] = array($field["orig"]);
			}
			if ($field["orig"] != "") {
				$orig_field = next($orig_fields);
				if (!$orig_field) {
					$after = "";
				}
			}
		}
		
		$partitioning = "";
		if (in_array($row["partition_by"], $partition_by)) {
			$partitions = array();
			if ($row["partition_by"] == 'RANGE' || $row["partition_by"] == 'LIST') {
				foreach (array_filter($row["partition_names"]) as $key => $val) {
					$value = $row["partition_values"][$key];
					$partitions[] = "\n  PARTITION " . idf_escape($val) . " VALUES " . ($row["partition_by"] == 'RANGE' ? "LESS THAN" : "IN") . ($value != "" ? " ($value)" : " MAXVALUE"); //! SQL injection
				}
			}
			$partitioning .= "\nPARTITION BY $row[partition_by]($row[partition])" . ($partitions // $row["partition"] can be expression, not only column
				? " (" . implode(",", $partitions) . "\n)"
				: ($row["partitions"] ? " PARTITIONS " . (+$row["partitions"]) : "")
			);
		} elseif (support("partitioning") && ereg("partitioned", $table_status["Create_options"])) {
			$partitioning .= "\nREMOVE PARTITIONING";
		}
		
		$message = lang(150);
		if ($TABLE == "") {
			cookie("adminer_engine", $row["Engine"]);
			$message = lang(151);
		}
		$name = trim($row["name"]);
		
		queries_redirect(ME . "table=" . urlencode($name), $message, alter_table(
			$TABLE,
			$name,
			($jush == "sqlite" && ($use_all_fields || $foreign) ? $all_fields : $fields),
			$foreign,
			$row["Comment"],
			($row["Engine"] && $row["Engine"] != $table_status["Engine"] ? $row["Engine"] : ""),
			($row["Collation"] && $row["Collation"] != $table_status["Collation"] ? $row["Collation"] : ""),
			($row["Auto_increment"] != "" ? +$row["Auto_increment"] : ""),
			$partitioning
		));
	}
}

page_header(($TABLE != "" ? lang(31) : lang(152)), $error, array("table" => $TABLE), $TABLE);

if (!$_POST) {
	$row = array(
		"Engine" => $_COOKIE["adminer_engine"],
		"fields" => array(array("field" => "", "type" => (isset($types["int"]) ? "int" : (isset($types["integer"]) ? "integer" : "")))),
		"partition_names" => array(""),
	);
	
	if ($TABLE != "") {
		$row = $table_status;
		$row["name"] = $TABLE;
		$row["fields"] = array();
		if (!$_GET["auto_increment"]) { // don't prefill by original Auto_increment for the sake of performance and not reusing deleted ids
			$row["Auto_increment"] = "";
		}
		foreach ($orig_fields as $field) {
			$field["has_default"] = isset($field["default"]);
			$row["fields"][] = $field;
		}
		
		if (support("partitioning")) {
			$from = "FROM information_schema.PARTITIONS WHERE TABLE_SCHEMA = " . q(DB) . " AND TABLE_NAME = " . q($TABLE);
			$result = $connection->query("SELECT PARTITION_METHOD, PARTITION_ORDINAL_POSITION, PARTITION_EXPRESSION $from ORDER BY PARTITION_ORDINAL_POSITION DESC LIMIT 1");
			list($row["partition_by"], $row["partitions"], $row["partition"]) = $result->fetch_row();
			$partitions = get_key_vals("SELECT PARTITION_NAME, PARTITION_DESCRIPTION $from AND PARTITION_NAME != '' ORDER BY PARTITION_ORDINAL_POSITION");
			$partitions[""] = "";
			$row["partition_names"] = array_keys($partitions);
			$row["partition_values"] = array_values($partitions);
		}
	}
}

$collations = collations();
$engines = engines();
// case of engine may differ
foreach ($engines as $engine) {
	if (!strcasecmp($engine, $row["Engine"])) {
		$row["Engine"] = $engine;
		break;
	}
}
?>

<form action="" method="post" id="form">
<p>
<?php echo lang(153); ?>: <input name="name" maxlength="64" value="<?php echo h($row["name"]); ?>" autocapitalize="off">
<?php if ($TABLE == "" && !$_POST) { ?><script type='text/javascript'>focus(document.getElementById('form')['name']);</script><?php }  echo ($engines ? html_select("Engine", array("" => "(" . lang(154) . ")") + $engines, $row["Engine"]) : ""); ?>
 <?php echo ($collations && !ereg("sqlite|mssql", $jush) ? html_select("Collation", array("" => "(" . lang(91) . ")") + $collations, $row["Collation"]) : ""); ?>
 <input type="submit" value="<?php echo lang(145); ?>">
<table cellspacing="0" id="edit-fields" class="nowrap">
<?php
$comments = ($_POST ? $_POST["comments"] : $row["Comment"] != "");
if (!$_POST && !$comments) {
	foreach ($row["fields"] as $field) {
		if ($field["comment"] != "") {
			$comments = true;
			break;
		}
	}
}
edit_fields($row["fields"], $collations, "TABLE", $foreign_keys, $comments);
?>
</table>
<p>
<?php echo lang(99); ?>: <input type="number" name="Auto_increment" size="6" value="<?php echo h($row["Auto_increment"]); ?>">
<?php echo checkbox("defaults", 1, true, lang(100), "columnShow(this.checked, 5)", "jsonly");  if (!$_POST["defaults"]) { ?><script type="text/javascript">editingHideDefaults()</script><?php }  echo (support("comment")
	? "<label><input type='checkbox' name='comments' value='1' class='jsonly' onclick=\"columnShow(this.checked, 6); toggle('Comment'); if (this.checked) this.form['Comment'].focus();\"" . ($comments ? " checked" : "") . ">" . lang(101) . "</label>"
		. ' <input name="Comment" id="Comment" value="' . h($row["Comment"]) . '" maxlength="' . ($connection->server_info >= 5.5 ? 2048 : 60) . '"' . ($comments ? '' : ' class="hidden"') . '>'
	: '')
; ?>
<p>
<input type="submit" value="<?php echo lang(145); ?>">
<?php if ($_GET["create"] != "") { ?><input type="submit" name="drop" value="<?php echo lang(86); ?>"<?php echo confirm(); ?>><?php } 
if (support("partitioning")) {
	$partition_table = ereg('RANGE|LIST', $row["partition_by"]);
	print_fieldset("partition", lang(155), $row["partition_by"]);
	?>
<p>
<?php echo html_select("partition_by", array(-1 => "") + $partition_by, $row["partition_by"], "partitionByChange(this);"); ?>
(<input name="partition" value="<?php echo h($row["partition"]); ?>">)
<?php echo lang(156); ?>: <input type="number" name="partitions" class="size" value="<?php echo h($row["partitions"]); ?>"<?php echo ($partition_table || !$row["partition_by"] ? " class='hidden'" : ""); ?>>
<table cellspacing="0" id="partition-table"<?php echo ($partition_table ? "" : " class='hidden'"); ?>>
<thead><tr><th><?php echo lang(157); ?><th><?php echo lang(158); ?></thead>
<?php
foreach ($row["partition_names"] as $key => $val) {
	echo '<tr>';
	echo '<td><input name="partition_names[]" value="' . h($val) . '"' . ($key == count($row["partition_names"]) - 1 ? ' onchange="partitionNameChange(this);"' : '') . ' autocapitalize="off">';
	echo '<td><input name="partition_values[]" value="' . h($row["partition_values"][$key]) . '">';
}
?>
</table>
</div></fieldset>
<?php
}
?>
<input type="hidden" name="token" value="<?php echo $token; ?>">
</form>
<?php
} elseif (isset($_GET["indexes"])) {
	
$TABLE = $_GET["indexes"];
$index_types = array("PRIMARY", "UNIQUE", "INDEX");
$table_status = table_status($TABLE, true);
if (eregi("MyISAM|M?aria" . ($connection->server_info >= 5.6 ? "|InnoDB" : ""), $table_status["Engine"])) {
	$index_types[] = "FULLTEXT";
}
$indexes = indexes($TABLE);
if ($jush == "sqlite") { // doesn't support primary key
	unset($index_types[0]);
	unset($indexes[""]);
}
$row = $_POST;

if ($_POST && !$error && !$_POST["add"]) {
	$alter = array();
	foreach ($row["indexes"] as $index) {
		$name = $index["name"];
		if (in_array($index["type"], $index_types)) {
			$columns = array();
			$lengths = array();
			$descs = array();
			$set = array();
			ksort($index["columns"]);
			foreach ($index["columns"] as $key => $column) {
				if ($column != "") {
					$length = $index["lengths"][$key];
					$desc = $index["descs"][$key];
					$set[] = idf_escape($column) . ($length ? "(" . (+$length) . ")" : "") . ($desc ? " DESC" : "");
					$columns[] = $column;
					$lengths[] = ($length ? $length : null);
					$descs[] = $desc;
				}
			}
			
			if ($columns) {
				$existing = $indexes[$name];
				if ($existing) {
					ksort($existing["columns"]);
					ksort($existing["lengths"]);
					ksort($existing["descs"]);
					if ($index["type"] == $existing["type"]
						&& array_values($existing["columns"]) === $columns
						&& (!$existing["lengths"] || array_values($existing["lengths"]) === $lengths)
						&& array_values($existing["descs"]) === $descs
					) {
						// skip existing index
						unset($indexes[$name]);
						continue;
					}
				}
				$alter[] = array($index["type"], $name, "(" . implode(", ", $set) . ")");
			}
		}
	}
	
	// drop removed indexes
	foreach ($indexes as $name => $existing) {
		$alter[] = array($existing["type"], $name, "DROP");
	}
	if (!$alter) {
		redirect(ME . "table=" . urlencode($TABLE));
	}
	queries_redirect(ME . "table=" . urlencode($TABLE), lang(159), alter_indexes($TABLE, $alter));
}

page_header(lang(109), $error, array("table" => $TABLE), $TABLE);

$fields = array_keys(fields($TABLE));
if ($_POST["add"]) {
	foreach ($row["indexes"] as $key => $index) {
		if ($index["columns"][count($index["columns"])] != "") {
			$row["indexes"][$key]["columns"][] = "";
		}
	}
	$index = end($row["indexes"]);
	if ($index["type"]
		|| array_filter($index["columns"], 'strlen')
		|| array_filter($index["lengths"], 'strlen')
		|| array_filter($index["descs"])
	) {
		$row["indexes"][] = array("columns" => array(1 => ""));
	}
}
if (!$row) {
	foreach ($indexes as $key => $index) {
		$indexes[$key]["name"] = $key;
		$indexes[$key]["columns"][] = "";
	}
	$indexes[] = array("columns" => array(1 => ""));
	$row["indexes"] = $indexes;
}
?>

<form action="" method="post">
<table cellspacing="0" class="nowrap">
<thead><tr><th><?php echo lang(160); ?><th><?php echo lang(161); ?><th><?php echo lang(162); ?></thead>
<?php
$j = 1;
foreach ($row["indexes"] as $index) {
	echo "<tr><td>" . html_select("indexes[$j][type]", array(-1 => "") + $index_types, $index["type"], ($j == count($row["indexes"]) ? "indexesAddRow(this);" : 1)) . "<td>";
	ksort($index["columns"]);
	
	$i = 1;
	foreach ($index["columns"] as $key => $column) {
		echo "<span>" . html_select("indexes[$j][columns][$i]", array(-1 => "") + $fields, $column, ($i == count($index["columns"]) ? "indexesAddColumn" : "indexesChangeColumn") . "(this, '" . js_escape($jush == "sql" ? "" : $_GET["indexes"] . "_") . "');");
		echo ($jush == "sql" || $jush == "mssql" ? "<input type='number' name='indexes[$j][lengths][$i]' class='size' value='" . h($index["lengths"][$key]) . "'>" : "");
		echo ($jush != "sql" ? checkbox("indexes[$j][descs][$i]", 1, $index["descs"][$key], lang(42)) : "");
		echo " </span>";
		$i++;
	}
	
	echo "<td><input name='indexes[$j][name]' value='" . h($index["name"]) . "' autocapitalize='off'>\n";
	$j++;
}
?>
</table>
<p>
<input type="submit" value="<?php echo lang(145); ?>">
<noscript><p><input type="submit" name="add" value="<?php echo lang(102); ?>"></noscript>
<input type="hidden" name="token" value="<?php echo $token; ?>">
</form>
<?php
} elseif (isset($_GET["database"])) {
	
$row = $_POST;

if ($_POST && !$error && !isset($_POST["add_x"])) { // add is an image and PHP changes add.x to add_x
	restart_session();
	$name = trim($row["name"]);
	if ($_POST["drop"]) {
		$_GET["db"] = ""; // to save in global history
		queries_redirect(remove_from_uri("db|database"), lang(163), drop_databases(array(DB)));
	} elseif (DB !== $name) {
		// create or rename database
		if (DB != "") {
			$_GET["db"] = $name;
			queries_redirect(preg_replace('~db=[^&]*&~', '', ME) . "db=" . urlencode($name), lang(164), rename_database($name, $row["collation"]));
		} else {
			$databases = explode("\n", str_replace("\r", "", $name));
			$success = true;
			$last = "";
			foreach ($databases as $db) {
				if (count($databases) == 1 || $db != "") { // ignore empty lines but always try to create single database
					if (!create_database($db, $row["collation"])) {
						$success = false;
					}
					$last = $db;
				}
			}
			queries_redirect(ME . "db=" . urlencode($last), lang(165), $success);
		}
	} else {
		// alter database
		if (!$row["collation"]) {
			redirect(substr(ME, 0, -1));
		}
		query_redirect("ALTER DATABASE " . idf_escape($name) . (eregi('^[a-z0-9_]+$', $row["collation"]) ? " COLLATE $row[collation]" : ""), substr(ME, 0, -1), lang(166));
	}
}

page_header(DB != "" ? lang(50) : lang(167), $error, array(), DB);

$collations = collations();
$name = DB;
if ($_POST) {
	$name = $row["name"];
} elseif (DB != "") {
	$row["collation"] = db_collation(DB, $collations);
} elseif ($jush == "sql") {
	// propose database name with limited privileges
	foreach (get_vals("SHOW GRANTS") as $grant) {
		if (preg_match('~ ON (`(([^\\\\`]|``|\\\\.)*)%`\\.\\*)?~', $grant, $match) && $match[1]) {
			$name = stripcslashes(idf_unescape("`$match[2]`"));
			break;
		}
	}
}
?>

<form action="" method="post">
<p>
<?php
echo ($_POST["add_x"] || strpos($name, "\n")
	? '<textarea id="name" name="name" rows="10" cols="40">' . h($name) . '</textarea><br>'
	: '<input name="name" id="name" value="' . h($name) . '" maxlength="64" autocapitalize="off">'
) . "\n" . ($collations ? html_select("collation", array("" => "(" . lang(91) . ")") + $collations, $row["collation"]) : "");
?>
<script type='text/javascript'>focus(document.getElementById('name'));</script>
<input type="submit" value="<?php echo lang(145); ?>">
<?php
if (DB != "") {
	echo "<input type='submit' name='drop' value='" . lang(86) . "'" . confirm() . ">\n";
} elseif (!$_POST["add_x"] && $_GET["db"] == "") {
	echo "<input type='image' name='add' src='" . h(preg_replace("~\\?.*~", "", ME)) . "?file=plus.gif&amp;version=3.7.1' alt='+' title='" . lang(102) . "'>\n";
}
?>
<input type="hidden" name="token" value="<?php echo $token; ?>">
</form>
<?php
} elseif (isset($_GET["scheme"])) {
	
$row = $_POST;

if ($_POST && !$error) {
	$link = preg_replace('~ns=[^&]*&~', '', ME) . "ns=";
	if ($_POST["drop"]) {
		query_redirect("DROP SCHEMA " . idf_escape($_GET["ns"]), $link, lang(168));
	} else {
		$name = trim($row["name"]);
		$link .= urlencode($name);
		if ($_GET["ns"] == "") {
			query_redirect("CREATE SCHEMA " . idf_escape($name), $link, lang(169));
		} elseif ($_GET["ns"] != $name) {
			query_redirect("ALTER SCHEMA " . idf_escape($_GET["ns"]) . " RENAME TO " . idf_escape($name), $link, lang(170)); //! sp_rename in MS SQL
		} else {
			redirect($link);
		}
	}
}

page_header($_GET["ns"] != "" ? lang(51) : lang(52), $error);

if (!$row) {
	$row["name"] = $_GET["ns"];
}
?>

<form action="" method="post">
<p><input name="name" id="name" value="<?php echo h($row["name"]); ?>" autocapitalize="off">
<script type='text/javascript'>focus(document.getElementById('name'));</script>
<input type="submit" value="<?php echo lang(145); ?>">
<?php
if ($_GET["ns"] != "") {
	echo "<input type='submit' name='drop' value='" . lang(86) . "'" . confirm() . ">\n";
}
?>
<input type="hidden" name="token" value="<?php echo $token; ?>">
</form>
<?php
} elseif (isset($_GET["call"])) {
	
$PROCEDURE = $_GET["call"];
page_header(lang(171) . ": " . h($PROCEDURE), $error);

$routine = routine($PROCEDURE, (isset($_GET["callf"]) ? "FUNCTION" : "PROCEDURE"));
$in = array();
$out = array();
foreach ($routine["fields"] as $i => $field) {
	if (substr($field["inout"], -3) == "OUT") {
		$out[$i] = "@" . idf_escape($field["field"]) . " AS " . idf_escape($field["field"]);
	}
	if (!$field["inout"] || substr($field["inout"], 0, 2) == "IN") {
		$in[] = $i;
	}
}

if (!$error && $_POST) {
	$call = array();
	foreach ($routine["fields"] as $key => $field) {
		if (in_array($key, $in)) {
			$val = process_input($field);
			if ($val === false) {
				$val = "''";
			}
			if (isset($out[$key])) {
				$connection->query("SET @" . idf_escape($field["field"]) . " = $val");
			}
		}
		$call[] = (isset($out[$key]) ? "@" . idf_escape($field["field"]) : $val);
	}
	
	$query = (isset($_GET["callf"]) ? "SELECT" : "CALL") . " " . idf_escape($PROCEDURE) . "(" . implode(", ", $call) . ")";
	echo "<p><code class='jush-$jush'>" . h($query) . "</code> <a href='" . h(ME) . "sql=" . urlencode($query) . "'>" . lang(34) . "</a>\n";
	
	if (!$connection->multi_query($query)) {
		echo "<p class='error'>" . error() . "\n";
	} else {
		$connection2 = connect();
		if (is_object($connection2)) {
			$connection2->select_db(DB);
		}
		
		do {
			$result = $connection->store_result();
			if (is_object($result)) {
				select($result, $connection2);
			} else {
				echo "<p class='message'>" . lang(172, $connection->affected_rows) . "\n";
			}
		} while ($connection->next_result());
		
		if ($out) {
			select($connection->query("SELECT " . implode(", ", $out)));
		}
	}
}
?>

<form action="" method="post">
<?php
if ($in) {
	echo "<table cellspacing='0'>\n";
	foreach ($in as $key) {
		$field = $routine["fields"][$key];
		$name = $field["field"];
		echo "<tr><th>" . $adminer->fieldName($field);
		$value = $_POST["fields"][$name];
		if ($value != "") {
			if ($field["type"] == "enum") {
				$value = +$value;
			}
			if ($field["type"] == "set") {
				$value = array_sum($value);
			}
		}
		input($field, $value, (string) $_POST["function"][$name]); // param name can be empty
		echo "\n";
	}
	echo "</table>\n";
}
?>
<p>
<input type="submit" value="<?php echo lang(171); ?>">
<input type="hidden" name="token" value="<?php echo $token; ?>">
</form>
<?php
} elseif (isset($_GET["foreign"])) {
	
$TABLE = $_GET["foreign"];
$name = $_GET["name"];
$row = $_POST;

if ($_POST && !$error && !$_POST["add"] && !$_POST["change"] && !$_POST["change-js"]) {
	if ($_POST["drop"]) {
		query_redirect("ALTER TABLE " . table($TABLE) . "\nDROP " . ($jush == "sql" ? "FOREIGN KEY " : "CONSTRAINT ") . idf_escape($name), ME . "table=" . urlencode($TABLE), lang(173));
	} else {
		$source = array_filter($row["source"], 'strlen');
		ksort($source); // enforce input order
		$target = array();
		foreach ($source as $key => $val) {
			$target[$key] = $row["target"][$key];
		}
		
		query_redirect("ALTER TABLE " . table($TABLE)
			. ($name != "" ? "\nDROP " . ($jush == "sql" ? "FOREIGN KEY " : "CONSTRAINT ") . idf_escape($name) . "," : "")
			. "\nADD FOREIGN KEY (" . implode(", ", array_map('idf_escape', $source)) . ") REFERENCES " . table($row["table"]) . " (" . implode(", ", array_map('idf_escape', $target)) . ")" //! reuse $name - check in older MySQL versions
			. (ereg("^($on_actions)\$", $row["on_delete"]) ? " ON DELETE $row[on_delete]" : "")
			. (ereg("^($on_actions)\$", $row["on_update"]) ? " ON UPDATE $row[on_update]" : "")
		, ME . "table=" . urlencode($TABLE), ($name != "" ? lang(174) : lang(175)));
		$error = lang(176) . "<br>$error"; //! no partitioning
	}
}

page_header(lang(177), $error, array("table" => $TABLE), $TABLE);

if ($_POST) {
	ksort($row["source"]);
	if ($_POST["add"]) {
		$row["source"][] = "";
	} elseif ($_POST["change"] || $_POST["change-js"]) {
		$row["target"] = array();
	}
} elseif ($name != "") {
	$foreign_keys = foreign_keys($TABLE);
	$row = $foreign_keys[$name];
	$row["source"][] = "";
} else {
	$row["table"] = $TABLE;
	$row["source"] = array("");
}

$source = array_keys(fields($TABLE)); //! no text and blob
$target = ($TABLE === $row["table"] ? $source : array_keys(fields($row["table"])));
$referencable = array_keys(array_filter(table_status('', true), 'fk_support'));
?>

<form action="" method="post">
<p>
<?php if ($row["db"] == "" && $row["ns"] == "") {  echo lang(178); ?>:
<?php echo html_select("table", $referencable, $row["table"], "this.form['change-js'].value = '1'; this.form.submit();"); ?>
<input type="hidden" name="change-js" value="">
<noscript><p><input type="submit" name="change" value="<?php echo lang(179); ?>"></noscript>
<table cellspacing="0">
<thead><tr><th><?php echo lang(111); ?><th><?php echo lang(112); ?></thead>
<?php
$j = 0;
foreach ($row["source"] as $key => $val) {
	echo "<tr>";
	echo "<td>" . html_select("source[" . (+$key) . "]", array(-1 => "") + $source, $val, ($j == count($row["source"]) - 1 ? "foreignAddRow(this);" : 1));
	echo "<td>" . html_select("target[" . (+$key) . "]", $target, $row["target"][$key]);
	$j++;
}
?>
</table>
<p>
<?php echo lang(93); ?>: <?php echo html_select("on_delete", array(-1 => "") + explode("|", $on_actions), $row["on_delete"]); ?>
 <?php echo lang(92); ?>: <?php echo html_select("on_update", array(-1 => "") + explode("|", $on_actions), $row["on_update"]); ?>
<p>
<input type="submit" value="<?php echo lang(145); ?>">
<noscript><p><input type="submit" name="add" value="<?php echo lang(180); ?>"></noscript>
<?php }  if ($name != "") { ?><input type="submit" name="drop" value="<?php echo lang(86); ?>"<?php echo confirm(); ?>><?php } ?>
<input type="hidden" name="token" value="<?php echo $token; ?>">
</form>
<?php
} elseif (isset($_GET["view"])) {
	
$TABLE = $_GET["view"];
$row = $_POST;

if ($_POST && !$error) {
	$name = trim($row["name"]);
	$as = " AS\n$row[select]";
	$location = ME . "table=" . urlencode($name);
	$message = lang(181);
	
	if (!$_POST["drop"] && $TABLE == $name && $jush != "sqlite") {
		query_redirect(($jush == "mssql" ? "ALTER" : "CREATE OR REPLACE") . " VIEW " . table($name) . $as, $location, $message);
	} else {
		$temp_name = $name . "_adminer_" . uniqid();
		drop_create(
			"DROP VIEW " . table($TABLE),
			"CREATE VIEW " . table($name) . $as,
			"DROP VIEW " . table($name),
			"CREATE VIEW " . table($temp_name) . $as,
			"DROP VIEW " . table($temp_name),
			($_POST["drop"] ? substr(ME, 0, -1) : $location),
			lang(182),
			$message,
			lang(183),
			$TABLE,
			$name
		);
	}
}

if (!$_POST && $TABLE != "") {
	$row = view($TABLE);
	$row["name"] = $TABLE;
	if (!$error) {
		$error = $connection->error;
	}
}

page_header(($TABLE != "" ? lang(30) : lang(184)), $error, array("table" => $TABLE), $TABLE);
?>

<form action="" method="post">
<p><?php echo lang(162); ?>: <input name="name" value="<?php echo h($row["name"]); ?>" maxlength="64" autocapitalize="off">
<p><?php textarea("select", $row["select"]); ?>
<p>
<input type="submit" value="<?php echo lang(145); ?>">
<?php if ($_GET["view"] != "") { ?><input type="submit" name="drop" value="<?php echo lang(86); ?>"<?php echo confirm(); ?>><?php } ?>
<input type="hidden" name="token" value="<?php echo $token; ?>">
</form>
<?php
} elseif (isset($_GET["event"])) {
	
$EVENT = $_GET["event"];
$intervals = array("YEAR", "QUARTER", "MONTH", "DAY", "HOUR", "MINUTE", "WEEK", "SECOND", "YEAR_MONTH", "DAY_HOUR", "DAY_MINUTE", "DAY_SECOND", "HOUR_MINUTE", "HOUR_SECOND", "MINUTE_SECOND");
$statuses = array("ENABLED" => "ENABLE", "DISABLED" => "DISABLE", "SLAVESIDE_DISABLED" => "DISABLE ON SLAVE");
$row = $_POST;

if ($_POST && !$error) {
	if ($_POST["drop"]) {
		query_redirect("DROP EVENT " . idf_escape($EVENT), substr(ME, 0, -1), lang(185));
	} elseif (in_array($row["INTERVAL_FIELD"], $intervals) && isset($statuses[$row["STATUS"]])) {
		$schedule = "\nON SCHEDULE " . ($row["INTERVAL_VALUE"]
			? "EVERY " . q($row["INTERVAL_VALUE"]) . " $row[INTERVAL_FIELD]"
			. ($row["STARTS"] ? " STARTS " . q($row["STARTS"]) : "")
			. ($row["ENDS"] ? " ENDS " . q($row["ENDS"]) : "") //! ALTER EVENT doesn't drop ENDS - MySQL bug #39173
			: "AT " . q($row["STARTS"])
			) . " ON COMPLETION" . ($row["ON_COMPLETION"] ? "" : " NOT") . " PRESERVE"
		;
		
		queries_redirect(substr(ME, 0, -1), ($EVENT != "" ? lang(186) : lang(187)), queries(($EVENT != ""
			? "ALTER EVENT " . idf_escape($EVENT) . $schedule
			. ($EVENT != $row["EVENT_NAME"] ? "\nRENAME TO " . idf_escape($row["EVENT_NAME"]) : "")
			: "CREATE EVENT " . idf_escape($row["EVENT_NAME"]) . $schedule
			) . "\n" . $statuses[$row["STATUS"]] . " COMMENT " . q($row["EVENT_COMMENT"])
			. rtrim(" DO\n$row[EVENT_DEFINITION]", ";") . ";"
		));
	}
}

page_header(($EVENT != "" ? lang(188) . ": " . h($EVENT) : lang(189)), $error);

if (!$row && $EVENT != "") {
	$rows = get_rows("SELECT * FROM information_schema.EVENTS WHERE EVENT_SCHEMA = " . q(DB) . " AND EVENT_NAME = " . q($EVENT));
	$row = reset($rows);
}
?>

<form action="" method="post">
<table cellspacing="0">
<tr><th><?php echo lang(162); ?><td><input name="EVENT_NAME" value="<?php echo h($row["EVENT_NAME"]); ?>" maxlength="64" autocapitalize="off">
<tr><th title="datetime"><?php echo lang(190); ?><td><input name="STARTS" value="<?php echo h("$row[EXECUTE_AT]$row[STARTS]"); ?>">
<tr><th title="datetime"><?php echo lang(191); ?><td><input name="ENDS" value="<?php echo h($row["ENDS"]); ?>">
<tr><th><?php echo lang(192); ?><td><input type="number" name="INTERVAL_VALUE" value="<?php echo h($row["INTERVAL_VALUE"]); ?>" class="size"> <?php echo html_select("INTERVAL_FIELD", $intervals, $row["INTERVAL_FIELD"]); ?>
<tr><th><?php echo lang(80); ?><td><?php echo html_select("STATUS", $statuses, $row["STATUS"]); ?>
<tr><th><?php echo lang(101); ?><td><input name="EVENT_COMMENT" value="<?php echo h($row["EVENT_COMMENT"]); ?>" maxlength="64">
<tr><th>&nbsp;<td><?php echo checkbox("ON_COMPLETION", "PRESERVE", $row["ON_COMPLETION"] == "PRESERVE", lang(193)); ?>
</table>
<p><?php textarea("EVENT_DEFINITION", $row["EVENT_DEFINITION"]); ?>
<p>
<input type="submit" value="<?php echo lang(145); ?>">
<?php if ($EVENT != "") { ?><input type="submit" name="drop" value="<?php echo lang(86); ?>"<?php echo confirm(); ?>><?php } ?>
<input type="hidden" name="token" value="<?php echo $token; ?>">
</form>
<?php
} elseif (isset($_GET["procedure"])) {
	
$PROCEDURE = $_GET["procedure"];
$routine = (isset($_GET["function"]) ? "FUNCTION" : "PROCEDURE");
$row = $_POST;
$row["fields"] = (array) $row["fields"];

if ($_POST && !process_fields($row["fields"]) && !$error) {
	$temp_name = "$row[name]_adminer_" . uniqid();
	drop_create(
		"DROP $routine " . idf_escape($PROCEDURE),
		create_routine($routine, $row),
		"DROP $routine " . idf_escape($row["name"]),
		create_routine($routine, array("name" => $temp_name) + $row),
		"DROP $routine " . idf_escape($temp_name),
		substr(ME, 0, -1),
		lang(194),
		lang(195),
		lang(196),
		$PROCEDURE,
		$row["name"]
	);
}

page_header(($PROCEDURE != "" ? (isset($_GET["function"]) ? lang(197) : lang(198)) . ": " . h($PROCEDURE) : (isset($_GET["function"]) ? lang(199) : lang(200))), $error);

if (!$_POST && $PROCEDURE != "") {
	$row = routine($PROCEDURE, $routine);
	$row["name"] = $PROCEDURE;
}

$collations = get_vals("SHOW CHARACTER SET");
sort($collations);
$routine_languages = routine_languages();
?>

<form action="" method="post" id="form">
<p><?php echo lang(162); ?>: <input name="name" value="<?php echo h($row["name"]); ?>" maxlength="64" autocapitalize="off">
<?php echo ($routine_languages ? lang(9) . ": " . html_select("language", $routine_languages, $row["language"]) : ""); ?>
<table cellspacing="0" class="nowrap">
<?php
edit_fields($row["fields"], $collations, $routine);
if (isset($_GET["function"])) {
	echo "<tr><td>" . lang(201);
	edit_type("returns", $row["returns"], $collations);
}
?>
</table>
<p><?php textarea("definition", $row["definition"]); ?>
<p>
<input type="submit" value="<?php echo lang(145); ?>">
<?php if ($PROCEDURE != "") { ?><input type="submit" name="drop" value="<?php echo lang(86); ?>"<?php echo confirm(); ?>><?php } ?>
<input type="hidden" name="token" value="<?php echo $token; ?>">
</form>
<?php
} elseif (isset($_GET["sequence"])) {
	
$SEQUENCE = $_GET["sequence"];
$row = $_POST;

if ($_POST && !$error) {
	$link = substr(ME, 0, -1);
	$name = trim($row["name"]);
	if ($_POST["drop"]) {
		query_redirect("DROP SEQUENCE " . idf_escape($SEQUENCE), $link, lang(202));
	} elseif ($SEQUENCE == "") {
		query_redirect("CREATE SEQUENCE " . idf_escape($name), $link, lang(203));
	} elseif ($SEQUENCE != $name) {
		query_redirect("ALTER SEQUENCE " . idf_escape($SEQUENCE) . " RENAME TO " . idf_escape($name), $link, lang(204));
	} else {
		redirect($link);
	}
}

page_header($SEQUENCE != "" ? lang(205) . ": " . h($SEQUENCE) : lang(206), $error);

if (!$row) {
	$row["name"] = $SEQUENCE;
}
?>

<form action="" method="post">
<p><input name="name" value="<?php echo h($row["name"]); ?>" autocapitalize="off">
<input type="submit" value="<?php echo lang(145); ?>">
<?php
if ($SEQUENCE != "") {
	echo "<input type='submit' name='drop' value='" . lang(86) . "'" . confirm() . ">\n";
}
?>
<input type="hidden" name="token" value="<?php echo $token; ?>">
</form>
<?php
} elseif (isset($_GET["type"])) {
	
$TYPE = $_GET["type"];
$row = $_POST;

if ($_POST && !$error) {
	$link = substr(ME, 0, -1);
	if ($_POST["drop"]) {
		query_redirect("DROP TYPE " . idf_escape($TYPE), $link, lang(207));
	} else {
		query_redirect("CREATE TYPE " . idf_escape(trim($row["name"])) . " $row[as]", $link, lang(208));
	}
}

page_header($TYPE != "" ? lang(209) . ": " . h($TYPE) : lang(210), $error);

if (!$row) {
	$row["as"] = "AS ";
}
?>

<form action="" method="post">
<p>
<?php
if ($TYPE != "") {
	echo "<input type='submit' name='drop' value='" . lang(86) . "'" . confirm() . ">\n";
} else {
	echo "<input name='name' value='" . h($row['name']) . "' autocapitalize='off'>\n";
	textarea("as", $row["as"]);
	echo "<p><input type='submit' value='" . lang(145) . "'>\n";
}
?>
<input type="hidden" name="token" value="<?php echo $token; ?>">
</form>
<?php
} elseif (isset($_GET["trigger"])) {
	
$TABLE = $_GET["trigger"];
$name = $_GET["name"];
$trigger_options = trigger_options();
$trigger_event = array("INSERT", "UPDATE", "DELETE");
$row = (array) trigger($name) + array("Trigger" => $TABLE . "_bi");

if ($_POST) {
	if (!$error && in_array($_POST["Timing"], $trigger_options["Timing"]) && in_array($_POST["Event"], $trigger_event) && in_array($_POST["Type"], $trigger_options["Type"])) {
		// don't use drop_create() because there may not be more triggers for the same action
		$on = " ON " . table($TABLE);
		$drop = "DROP TRIGGER " . idf_escape($name) . ($jush == "pgsql" ? $on : "");
		$location = ME . "table=" . urlencode($TABLE);
		if ($_POST["drop"]) {
			query_redirect($drop, $location, lang(211));
		} else {
			if ($name != "") {
				queries($drop);
			}
			queries_redirect(
				$location,
				($name != "" ? lang(212) : lang(213)),
				queries(create_trigger($on, $_POST))
			);
			if ($name != "") {
				queries(create_trigger($on, $row + array("Type" => reset($trigger_options["Type"]))));
			}
		}
	}
	$row = $_POST;
}

page_header(($name != "" ? lang(214) . ": " . h($name) : lang(215)), $error, array("table" => $TABLE));
?>

<form action="" method="post" id="form">
<table cellspacing="0">
<tr><th><?php echo lang(216); ?><td><?php echo html_select("Timing", $trigger_options["Timing"], $row["Timing"], "if (/^" . preg_quote($TABLE, "/") . "_[ba][iud]$/.test(this.form['Trigger'].value)) this.form['Trigger'].value = '" . js_escape($TABLE) . "_' + selectValue(this).charAt(0).toLowerCase() + selectValue(this.form['Event']).charAt(0).toLowerCase();"); ?>
<tr><th><?php echo lang(217); ?><td><?php echo html_select("Event", $trigger_event, $row["Event"], "this.form['Timing'].onchange();"); ?>
<tr><th><?php echo lang(96); ?><td><?php echo html_select("Type", $trigger_options["Type"], $row["Type"]); ?>
</table>
<p><?php echo lang(162); ?>: <input name="Trigger" value="<?php echo h($row["Trigger"]); ?>" maxlength="64" autocapitalize="off">
<p><?php textarea("Statement", $row["Statement"]); ?>
<p>
<input type="submit" value="<?php echo lang(145); ?>">
<?php if ($name != "") { ?><input type="submit" name="drop" value="<?php echo lang(86); ?>"<?php echo confirm(); ?>><?php } ?>
<input type="hidden" name="token" value="<?php echo $token; ?>">
</form>
<?php
} elseif (isset($_GET["user"])) {
	
$USER = $_GET["user"];
$privileges = array("" => array("All privileges" => ""));
foreach (get_rows("SHOW PRIVILEGES") as $row) {
	foreach (explode(",", ($row["Privilege"] == "Grant option" ? "" : $row["Context"])) as $context) {
		$privileges[$context][$row["Privilege"]] = $row["Comment"];
	}
}
$privileges["Server Admin"] += $privileges["File access on server"];
$privileges["Databases"]["Create routine"] = $privileges["Procedures"]["Create routine"]; // MySQL bug #30305
unset($privileges["Procedures"]["Create routine"]);
$privileges["Columns"] = array();
foreach (array("Select", "Insert", "Update", "References") as $val) {
	$privileges["Columns"][$val] = $privileges["Tables"][$val];
}
unset($privileges["Server Admin"]["Usage"]);
foreach ($privileges["Tables"] as $key => $val) {
	unset($privileges["Databases"][$key]);
}

$new_grants = array();
if ($_POST) {
	foreach ($_POST["objects"] as $key => $val) {
		$new_grants[$val] = (array) $new_grants[$val] + (array) $_POST["grants"][$key];
	}
}
$grants = array();
$old_pass = "";

if (isset($_GET["host"]) && ($result = $connection->query("SHOW GRANTS FOR " . q($USER) . "@" . q($_GET["host"])))) { //! use information_schema for MySQL 5 - column names in column privileges are not escaped
	while ($row = $result->fetch_row()) {
		if (preg_match('~GRANT (.*) ON (.*) TO ~', $row[0], $match) && preg_match_all('~ *([^(,]*[^ ,(])( *\\([^)]+\\))?~', $match[1], $matches, PREG_SET_ORDER)) { //! escape the part between ON and TO
			foreach ($matches as $val) {
				if ($val[1] != "USAGE") {
					$grants["$match[2]$val[2]"][$val[1]] = true;
				}
				if (ereg(' WITH GRANT OPTION', $row[0])) { //! don't check inside strings and identifiers
					$grants["$match[2]$val[2]"]["GRANT OPTION"] = true;
				}
			}
		}
		if (preg_match("~ IDENTIFIED BY PASSWORD '([^']+)~", $row[0], $match)) {
			$old_pass = $match[1];
		}
	}
}

if ($_POST && !$error) {
	$old_user = (isset($_GET["host"]) ? q($USER) . "@" . q($_GET["host"]) : "''");
	if ($_POST["drop"]) {
		query_redirect("DROP USER $old_user", ME . "privileges=", lang(218));
	} else {
		$new_user = q($_POST["user"]) . "@" . q($_POST["host"]); // if $_GET["host"] is not set then $new_user is always different
		$pass = $_POST["pass"];
		if ($pass != '' && !$_POST["hashed"]) {
			// compute hash in a separate query so that plain text password is not saved to history
			$pass = $connection->result("SELECT PASSWORD(" . q($pass) . ")");
			$error = !$pass;
		}
		
		$created = false;
		if (!$error) {
			if ($old_user != $new_user) {
				$created = queries(($connection->server_info < 5 ? "GRANT USAGE ON *.* TO" : "CREATE USER") . " $new_user IDENTIFIED BY PASSWORD " . q($pass));
				$error = !$created;
			} elseif ($pass != $old_pass) {
				queries("SET PASSWORD FOR $new_user = " . q($pass));
			}
		}
		
		if (!$error) {
			$revoke = array();
			foreach ($new_grants as $object => $grant) {
				if (isset($_GET["grant"])) {
					$grant = array_filter($grant);
				}
				$grant = array_keys($grant);
				if (isset($_GET["grant"])) {
					// no rights to mysql.user table
					$revoke = array_diff(array_keys(array_filter($new_grants[$object], 'strlen')), $grant);
				} elseif ($old_user == $new_user) {
					$old_grant = array_keys((array) $grants[$object]);
					$revoke = array_diff($old_grant, $grant);
					$grant = array_diff($grant, $old_grant);
					unset($grants[$object]);
				}
				if (preg_match('~^(.+)\\s*(\\(.*\\))?$~U', $object, $match) && (
					!grant("REVOKE", $revoke, $match[2], " ON $match[1] FROM $new_user") //! SQL injection
					|| !grant("GRANT", $grant, $match[2], " ON $match[1] TO $new_user")
				)) {
					$error = true;
					break;
				}
			}
		}
		
		if (!$error && isset($_GET["host"])) {
			if ($old_user != $new_user) {
				queries("DROP USER $old_user");
			} elseif (!isset($_GET["grant"])) {
				foreach ($grants as $object => $revoke) {
					if (preg_match('~^(.+)(\\(.*\\))?$~U', $object, $match)) {
						grant("REVOKE", array_keys($revoke), $match[2], " ON $match[1] FROM $new_user");
					}
				}
			}
		}
		
		queries_redirect(ME . "privileges=", (isset($_GET["host"]) ? lang(219) : lang(220)), !$error);
		
		if ($created) {
			// delete new user in case of an error
			$connection->query("DROP USER $new_user");
		}
	}
}

page_header((isset($_GET["host"]) ? lang(23) . ": " . h("$USER@$_GET[host]") : lang(124)), $error, array("privileges" => array('', lang(54))));

if ($_POST) {
	$row = $_POST;
	$grants = $new_grants;
} else {
	$row = $_GET + array("host" => $connection->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', -1)")); // create user on the same domain by default
	$row["pass"] = $old_pass;
	if ($old_pass != "") {
		$row["hashed"] = true;
	}
	$grants[(DB == "" || $grants ? "" : idf_escape(addcslashes(DB, "%_\\"))) . ".*"] = array();
}

?>
<form action="" method="post">
<table cellspacing="0">
<tr><th><?php echo lang(22); ?><td><input name="host" maxlength="60" value="<?php echo h($row["host"]); ?>" autocapitalize="off">
<tr><th><?php echo lang(23); ?><td><input name="user" maxlength="16" value="<?php echo h($row["user"]); ?>" autocapitalize="off">
<tr><th><?php echo lang(24); ?><td><input name="pass" id="pass" value="<?php echo h($row["pass"]); ?>">
<?php if (!$row["hashed"]) { ?><script type="text/javascript">typePassword(document.getElementById('pass'));</script><?php }  echo checkbox("hashed", 1, $row["hashed"], lang(221), "typePassword(this.form['pass'], this.checked);"); ?>
</table>

<?php
//! MAX_* limits, REQUIRE
echo "<table cellspacing='0'>\n";
echo "<thead><tr><th colspan='2'><a href='http://dev.mysql.com/doc/refman/" . substr($connection->server_info, 0, 3) . "/en/grant.html#priv_level' target='_blank' rel='noreferrer' class='help'>" . lang(54) . "</a>";
$i = 0;
foreach ($grants as $object => $grant) {
	echo '<th>' . ($object != "*.*" ? "<input name='objects[$i]' value='" . h($object) . "' size='10' autocapitalize='off'>" : "<input type='hidden' name='objects[$i]' value='*.*' size='10'>*.*"); //! separate db, table, columns, PROCEDURE|FUNCTION, routine
	$i++;
}
echo "</thead>\n";

foreach (array(
	"" => "",
	"Server Admin" => lang(22),
	"Databases" => lang(25),
	"Tables" => lang(107),
	"Columns" => lang(108),
	"Procedures" => lang(222),
) as $context => $desc) {
	foreach ((array) $privileges[$context] as $privilege => $comment) {
		echo "<tr" . odd() . "><td" . ($desc ? ">$desc<td" : " colspan='2'") . ' lang="en" title="' . h($comment) . '">' . h($privilege);
		$i = 0;
		foreach ($grants as $object => $grant) {
			$name = "'grants[$i][" . h(strtoupper($privilege)) . "]'";
			$value = $grant[strtoupper($privilege)];
			if ($context == "Server Admin" && $object != (isset($grants["*.*"]) ? "*.*" : ".*")) {
				echo "<td>&nbsp;";
			} elseif (isset($_GET["grant"])) {
				echo "<td><select name=$name><option><option value='1'" . ($value ? " selected" : "") . ">" . lang(223) . "<option value='0'" . ($value == "0" ? " selected" : "") . ">" . lang(224) . "</select>";
			} else {
				echo "<td align='center'><label class='block'><input type='checkbox' name=$name value='1'" . ($value ? " checked" : "") . ($privilege == "All privileges" ? " id='grants-$i-all'" : ($privilege == "Grant option" ? "" : " onclick=\"if (this.checked) formUncheck('grants-$i-all');\"")) . "></label>"; //! uncheck all except grant if all is checked
			}
			$i++;
		}
	}
}

echo "</table>\n";
?>
<p>
<input type="submit" value="<?php echo lang(145); ?>">
<?php if (isset($_GET["host"])) { ?><input type="submit" name="drop" value="<?php echo lang(86); ?>"<?php echo confirm(); ?>><?php } ?>
<input type="hidden" name="token" value="<?php echo $token; ?>">
</form>
<?php
} elseif (isset($_GET["processlist"])) {
	
if (support("kill") && $_POST && !$error) {
	$killed = 0;
	foreach ((array) $_POST["kill"] as $val) {
		if (queries("KILL " . (+$val))) {
			$killed++;
		}
	}
	queries_redirect(ME . "processlist=", lang(225, $killed), $killed || !$_POST["kill"]);
}

page_header(lang(78), $error);
?>

<form action="" method="post">
<table cellspacing="0" onclick="tableClick(event);" ondblclick="tableClick(event, true);" class="nowrap checkable">
<?php
// HTML valid because there is always at least one process
$i = -1;
foreach (process_list() as $i => $row) {
	
	if (!$i) {
		echo "<thead><tr lang='en'>" . (support("kill") ? "<th>&nbsp;" : "");
		foreach ($row as $key => $val) {
			echo "<th>" . ($jush == "sql"
				? "<a href='http://dev.mysql.com/doc/refman/" . substr($connection->server_info, 0, 3) . "/en/show-processlist.html#processlist_" . strtolower($key) . "' target='_blank' rel='noreferrer' class='help'>$key</a>"
				: $key
			);
		}
		echo "</thead>\n";
	}
	
	echo "<tr" . odd() . ">" . (support("kill") ? "<td>" . checkbox("kill[]", $row["Id"], 0) : "");
	foreach ($row as $key => $val) {
		echo "<td>" . (
			($jush == "sql" && $key == "Info" && ereg("Query|Killed", $row["Command"]) && $val != "") ||
			($jush == "pgsql" && $key == "current_query" && $val != "<IDLE>") ||
			($jush == "oracle" && $key == "sql_text" && $val != "")
			? "<code class='jush-$jush'>" . shorten_utf8($val, 100, "</code>") . ' <a href="' . h(ME . ($row["db"] != "" ? "db=" . urlencode($row["db"]) . "&" : "") . "sql=" . urlencode($val)) . '">' . lang(226) . '</a>'
			: nbsp($val)
		);
	}
	echo "\n";
}
?>
</table>
<script type='text/javascript'>tableCheck();</script>
<p>
<?php
if (support("kill")) {
	echo ($i + 1) . "/" . lang(227, $connection->result("SELECT @@max_connections"));
	echo "<p><input type='submit' value='" . lang(228) . "'>\n";
}
?>
<input type="hidden" name="token" value="<?php echo $token; ?>">
</form>
<?php
} elseif (isset($_GET["select"])) {
	
$TABLE = $_GET["select"];
$table_status = table_status1($TABLE);
$indexes = indexes($TABLE);
$fields = fields($TABLE);
$foreign_keys = column_foreign_keys($TABLE);
$oid = "";
if ($table_status["Oid"]) {
	$oid = ($jush == "sqlite" ? "rowid" : "oid");
	$indexes[] = array("type" => "PRIMARY", "columns" => array($oid));
}
parse_str($_COOKIE["adminer_import"], $adminer_import);

$rights = array(); // privilege => 0
$columns = array(); // selectable columns
$text_length = null;
foreach ($fields as $key => $field) {
	$name = $adminer->fieldName($field);
	if (isset($field["privileges"]["select"]) && $name != "") {
		$columns[$key] = html_entity_decode(strip_tags($name), ENT_QUOTES);
		if (is_shortable($field)) {
			$text_length = $adminer->selectLengthProcess();
		}
	}
	$rights += $field["privileges"];
}

list($select, $group) = $adminer->selectColumnsProcess($columns, $indexes);
$is_group = count($group) < count($select);
$where = $adminer->selectSearchProcess($fields, $indexes);
$order = $adminer->selectOrderProcess($fields, $indexes);
$limit = $adminer->selectLimitProcess();
$from = ($select ? implode(", ", $select) : "*" . ($oid ? ", $oid" : ""))
	. convert_fields($columns, $fields, $select)
	. "\nFROM " . table($TABLE);
$group_by = ($group && $is_group ? "\nGROUP BY " . implode(", ", $group) : "") . ($order ? "\nORDER BY " . implode(", ", $order) : "");

if ($_GET["val"] && is_ajax()) {
	header("Content-Type: text/plain; charset=utf-8");
	foreach ($_GET["val"] as $unique_idf => $row) {
		$as = convert_field($fields[key($row)]);
		echo $connection->result("SELECT" . limit($as ? $as : idf_escape(key($row)) . " FROM " . table($TABLE), " WHERE " . where_check($unique_idf, $fields) . ($where ? " AND " . implode(" AND ", $where) : "") . ($order ? " ORDER BY " . implode(", ", $order) : ""), 1));
	}
	exit;
}

if ($_POST && !$error) {
	$where_check = $where;
	if (is_array($_POST["check"])) {
		$where_check[] = "((" . implode(") OR (", array_map('where_check', $_POST["check"])) . "))";
	}
	$where_check = ($where_check ? "\nWHERE " . implode(" AND ", $where_check) : "");
	$primary = $unselected = null;
	foreach ($indexes as $index) {
		if ($index["type"] == "PRIMARY") {
			$primary = array_flip($index["columns"]);
			$unselected = ($select ? $primary : array());
			break;
		}
	}
	foreach ((array) $unselected as $key => $val) {
		if (in_array(idf_escape($key), $select)) {
			unset($unselected[$key]);
		}
	}
	
	if ($_POST["export"]) {
		cookie("adminer_import", "output=" . urlencode($_POST["output"]) . "&format=" . urlencode($_POST["format"]));
		dump_headers($TABLE);
		$adminer->dumpTable($TABLE, "");
		if (!is_array($_POST["check"]) || $unselected === array()) {
			$query = "SELECT $from$where_check$group_by";
		} else {
			$union = array();
			foreach ($_POST["check"] as $val) {
				// where is not unique so OR can't be used
				$union[] = "(SELECT" . limit($from, "\nWHERE " . ($where ? implode(" AND ", $where) . " AND " : "") . where_check($val, $fields) . $group_by, 1) . ")";
			}
			$query = implode(" UNION ALL ", $union);
		}
		$adminer->dumpData($TABLE, "table", $query);
		exit;
	}
	
	if (!$adminer->selectEmailProcess($where, $foreign_keys)) {
		if ($_POST["save"] || $_POST["delete"]) { // edit
			$result = true;
			$affected = 0;
			$query = table($TABLE);
			$set = array();
			if (!$_POST["delete"]) {
				foreach ($columns as $name => $val) { //! should check also for edit or insert privileges
					$val = process_input($fields[$name]);
					if ($val !== null) {
						if ($_POST["clone"]) {
							$set[idf_escape($name)] = ($val !== false ? $val : idf_escape($name));
						} elseif ($val !== false) {
							$set[] = idf_escape($name) . " = $val";
						}
					}
				}
				$query .= ($_POST["clone"] ? " (" . implode(", ", array_keys($set)) . ")\nSELECT " . implode(", ", $set) . "\nFROM " . table($TABLE) : " SET\n" . implode(",\n", $set));
			}
			if ($_POST["delete"] || $set) {
				$command = "UPDATE";
				if ($_POST["delete"]) {
					$command = "DELETE";
					$query = "FROM $query";
				}
				if ($_POST["clone"]) {
					$command = "INSERT";
					$query = "INTO $query";
				}
				if ($_POST["all"] || ($unselected === array() && is_array($_POST["check"])) || $is_group) {
					$result = queries("$command $query$where_check");
					$affected = $connection->affected_rows;
				} else {
					foreach ((array) $_POST["check"] as $val) {
						// where is not unique so OR can't be used
						$result = queries($command . limit1($query, "\nWHERE " . ($where ? implode(" AND ", $where) . " AND " : "") . where_check($val, $fields)));
						if (!$result) {
							break;
						}
						$affected += $connection->affected_rows;
					}
				}
			}
			$message = lang(229, $affected);
			if ($_POST["clone"] && $result && $affected == 1) {
				$last_id = last_id();
				if ($last_id) {
					$message = lang(142, " $last_id");
				}
			}
			queries_redirect(remove_from_uri($_POST["all"] && $_POST["delete"] ? "page" : ""), $message, $result);
			//! display edit page in case of an error
			
		} elseif (!$_POST["import"]) { // modify
			if (!$_POST["val"]) {
				$error = lang(230);
			} else {
				$result = true;
				$affected = 0;
				foreach ($_POST["val"] as $unique_idf => $row) {
					$set = array();
					foreach ($row as $key => $val) {
						$key = bracket_escape($key, 1); // 1 - back
						$set[] = idf_escape($key) . " = " . (ereg('char|text', $fields[$key]["type"]) || $val != "" ? $adminer->processInput($fields[$key], $val) : "NULL");
					}
					$query = table($TABLE) . " SET " . implode(", ", $set);
					$where2 = " WHERE " . where_check($unique_idf, $fields) . ($where ? " AND " . implode(" AND ", $where) : "");
					$result = queries("UPDATE" . ($is_group || $unselected === array() ? " $query$where2" : limit1($query, $where2))); // can change row on a different page without unique key
					if (!$result) {
						break;
					}
					$affected += $connection->affected_rows;
				}
				queries_redirect(remove_from_uri(), lang(229, $affected), $result);
			}
			
		} elseif (!is_string($file = get_file("csv_file", true))) {
			$error = upload_error($file);
		} elseif (!preg_match('~~u', $file)) {
			$error = lang(231);
		} else {
			cookie("adminer_import", "output=" . urlencode($adminer_import["output"]) . "&format=" . urlencode($_POST["separator"]));
			$result = true;
			$cols = array_keys($fields);
			preg_match_all('~(?>"[^"]*"|[^"\\r\\n]+)+~', $file, $matches);
			$affected = count($matches[0]);
			begin();
			$separator = ($_POST["separator"] == "csv" ? "," : ($_POST["separator"] == "tsv" ? "\t" : ";"));
			foreach ($matches[0] as $key => $val) {
				preg_match_all("~((?>\"[^\"]*\")+|[^$separator]*)$separator~", $val . $separator, $matches2);
				if (!$key && !array_diff($matches2[1], $cols)) { //! doesn't work with column names containing ",\n
					// first row corresponds to column names - use it for table structure
					$cols = $matches2[1];
					$affected--;
				} else {
					$set = array();
					foreach ($matches2[1] as $i => $col) {
						$set[idf_escape($cols[$i])] = ($col == "" && $fields[$cols[$i]]["null"] ? "NULL" : q(str_replace('""', '"', preg_replace('~^"|"$~', '', $col))));
					}
					$result = insert_update($TABLE, $set, $primary);
					if (!$result) {
						break;
					}
				}
			}
			if ($result) {
				queries("COMMIT");
			}
			queries_redirect(remove_from_uri("page"), lang(232, $affected), $result);
			queries("ROLLBACK"); // after queries_redirect() to not overwrite error
			
		}
	}
}

$table_name = $adminer->tableName($table_status);
if (is_ajax()) {
	// needs to send headers
	ob_start();
}
page_header(lang(36) . ": $table_name", $error);

$set = null;
if (isset($rights["insert"])) {
	$set = "";
	foreach ((array) $_GET["where"] as $val) {
		if (count($foreign_keys[$val["col"]]) == 1 && ($val["op"] == "="
			|| (!$val["op"] && !ereg('[_%]', $val["val"])) // LIKE in Editor
		)) {
			$set .= "&set" . urlencode("[" . bracket_escape($val["col"]) . "]") . "=" . urlencode($val["val"]);
		}
	}
}
$adminer->selectLinks($table_status, $set);

if (!$columns) {
	echo "<p class='error'>" . lang(233) . ($fields ? "." : ": " . error()) . "\n";
} else {
	echo "<form action='' id='form'>\n";
	echo "<div style='display: none;'>";
	hidden_fields_get();
	echo (DB != "" ? '<input type="hidden" name="db" value="' . h(DB) . '">' . (isset($_GET["ns"]) ? '<input type="hidden" name="ns" value="' . h($_GET["ns"]) . '">' : "") : ""); // not used in Editor
	echo '<input type="hidden" name="select" value="' . h($TABLE) . '">';
	echo "</div>\n";
	$adminer->selectColumnsPrint($select, $columns);
	$adminer->selectSearchPrint($where, $columns, $indexes);
	$adminer->selectOrderPrint($order, $columns, $indexes);
	$adminer->selectLimitPrint($limit);
	$adminer->selectLengthPrint($text_length);
	$adminer->selectActionPrint($indexes);
	echo "</form>\n";
	
	$page = $_GET["page"];
	if ($page == "last") {
		$found_rows = $connection->result("SELECT COUNT(*) FROM " . table($TABLE) . ($where ? " WHERE " . implode(" AND ", $where) : ""));
		$page = floor(max(0, $found_rows - 1) / $limit);
	}

	$query = $adminer->selectQueryBuild($select, $where, $group, $order, $limit, $page);
	if (!$query) {
		$query = "SELECT" . limit(
			(+$limit && $group && $is_group && $jush == "sql" ? "SQL_CALC_FOUND_ROWS " : "") . $from,
			($where ? "\nWHERE " . implode(" AND ", $where) : "") . $group_by,
			($limit != "" ? +$limit : null),
			($page ? $limit * $page : 0),
			"\n"
		);
	}
	echo $adminer->selectQuery($query);
	
	$result = $connection->query($query);
	if (!$result) {
		echo "<p class='error'>" . error() . "\n";
	} else {
		if ($jush == "mssql" && $page) {
			$result->seek($limit * $page);
		}
		$email_fields = array();
		echo "<form action='' method='post' enctype='multipart/form-data'>\n";
		$rows = array();
		while ($row = $result->fetch_assoc()) {
			if ($page && $jush == "oracle") {
				unset($row["RNUM"]);
			}
			$rows[] = $row;
		}
		// use count($rows) without LIMIT, COUNT(*) without grouping, FOUND_ROWS otherwise (slowest)
		if ($_GET["page"] != "last") {
			$found_rows = (+$limit && $group && $is_group
				? ($jush == "sql" ? $connection->result(" SELECT FOUND_ROWS()") : $connection->result("SELECT COUNT(*) FROM ($query) x")) // space to allow mysql.trace_mode
				: count($rows)
			);
		}
		
		if (!$rows) {
			echo "<p class='message'>" . lang(89) . "\n";
		} else {
			$backward_keys = $adminer->backwardKeys($TABLE, $table_name);
			
			echo "<table id='table' cellspacing='0' class='nowrap checkable' onclick='tableClick(event);' ondblclick='tableClick(event, true);' onkeydown='return editingKeydown(event);'>\n";
			echo "<thead><tr>" . (!$group && $select ? "" : "<td><input type='checkbox' id='all-page' onclick='formCheck(this, /check/);'> <a href='" . h($_GET["modify"] ? remove_from_uri("modify") : $_SERVER["REQUEST_URI"] . "&modify=1") . "'>" . lang(234) . "</a>");
			$names = array();
			$functions = array();
			reset($select);
			$rank = 1;
			foreach ($rows[0] as $key => $val) {
				if ($key != $oid) {
					$val = $_GET["columns"][key($select)];
					$field = $fields[$select ? ($val ? $val["col"] : current($select)) : $key];
					$name = ($field ? $adminer->fieldName($field, $rank) : "*");
					if ($name != "") {
						$rank++;
						$names[$key] = $name;
						$column = idf_escape($key);
						$href = remove_from_uri('(order|desc)[^=]*|page') . '&order%5B0%5D=' . urlencode($key);
						$desc = "&desc%5B0%5D=1";
						echo '<th onmouseover="columnMouse(this);" onmouseout="columnMouse(this, \' hidden\');">';
						echo '<a href="' . h($href . ($order[0] == $column || $order[0] == $key || (!$order && $is_group && $group[0] == $column) ? $desc : '')) . '">'; // $order[0] == $key - COUNT(*)
						echo (!$select || $val ? apply_sql_function($val["fun"], $name) : h(current($select))) . "</a>"; //! columns looking like functions
						echo "<span class='column hidden'>";
						echo "<a href='" . h($href . $desc) . "' title='" . lang(42) . "' class='text'> ↓</a>";
						if (!$val["fun"]) {
							echo '<a href="#fieldset-search" onclick="selectSearch(\'' . h(js_escape($key)) . '\'); return false;" title="' . lang(39) . '" class="text jsonly"> =</a>';
						}
						echo "</span>";
					}
					$functions[$key] = $val["fun"];
					next($select);
				}
			}
			
			$lengths = array();
			if ($_GET["modify"]) {
				foreach ($rows as $row) {
					foreach ($row as $key => $val) {
						$lengths[$key] = max($lengths[$key], min(40, strlen(utf8_decode($val))));
					}
				}
			}
			
			echo ($backward_keys ? "<th>" . lang(235) : "") . "</thead>\n";
			
			if (is_ajax()) {
				if ($limit % 2 == 1 && $page % 2 == 1) {
					odd();
				}
				ob_end_clean();
			}
			
			foreach ($adminer->rowDescriptions($rows, $foreign_keys) as $n => $row) {
				$unique_array = unique_array($rows[$n], $indexes);
				if (!$unique_array) {
					$unique_array = array();
					foreach ($rows[$n] as $key => $val) {
						if (!preg_match('~^(COUNT\\((\\*|(DISTINCT )?`(?:[^`]|``)+`)\\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\\(`(?:[^`]|``)+`\\))$~', $key)) { //! columns looking like functions
							$unique_array[$key] = $val;
						}
					}
				}
				$unique_idf = "";
				foreach ($unique_array as $key => $val) {
					if (strlen($val) > 64) {
						$key = "MD5(" . (strpos($key, '(') ? $key : idf_escape($key)) . ")"; //! columns looking like functions
						$val = md5($val);
					}
					$unique_idf .= "&" . ($val !== null ? urlencode("where[" . bracket_escape($key) . "]") . "=" . urlencode($val) : "null%5B%5D=" . urlencode($key));
				}
				echo "<tr" . odd() . ">" . (!$group && $select ? "" : "<td>" . checkbox("check[]", substr($unique_idf, 1), in_array(substr($unique_idf, 1), (array) $_POST["check"]), "", "this.form['all'].checked = false; formUncheck('all-page');") . ($is_group || information_schema(DB) ? "" : " <a href='" . h(ME . "edit=" . urlencode($TABLE) . $unique_idf) . "'>" . lang(234) . "</a>"));
				
				foreach ($row as $key => $val) {
					if (isset($names[$key])) {
						$field = $fields[$key];
						if ($val != "" && (!isset($email_fields[$key]) || $email_fields[$key] != "")) {
							$email_fields[$key] = (is_mail($val) ? $names[$key] : ""); //! filled e-mails can be contained on other pages
						}
						
						$link = "";
						$val = $adminer->editVal($val, $field);
						if ($val !== null) {
							if (ereg('blob|bytea|raw|file', $field["type"]) && $val != "") {
								$link = ME . 'download=' . urlencode($TABLE) . '&field=' . urlencode($key) . $unique_idf;
							}
							if ($val === "") { // === - may be int
								$val = "&nbsp;";
							} elseif ($text_length != "" && is_shortable($field)) {
								$val = shorten_utf8($val, max(0, +$text_length)); // usage of LEFT() would reduce traffic but complicate query - expected average speedup: .001 s VS .01 s on local network
							} else {
								$val = h($val);
							}
							
							if (!$link) { // link related items
								foreach ((array) $foreign_keys[$key] as $foreign_key) {
									if (count($foreign_keys[$key]) == 1 || end($foreign_key["source"]) == $key) {
										$link = "";
										foreach ($foreign_key["source"] as $i => $source) {
											$link .= where_link($i, $foreign_key["target"][$i], $rows[$n][$source]);
										}
										$link = ($foreign_key["db"] != "" ? preg_replace('~([?&]db=)[^&]+~', '\\1' . urlencode($foreign_key["db"]), ME) : ME) . 'select=' . urlencode($foreign_key["table"]) . $link; // InnoDB supports non-UNIQUE keys
										if (count($foreign_key["source"]) == 1) {
											break;
										}
									}
								}
							}
							
							if ($key == "COUNT(*)") { //! columns looking like functions
								$link = ME . "select=" . urlencode($TABLE);
								$i = 0;
								foreach ((array) $_GET["where"] as $v) {
									if (!array_key_exists($v["col"], $unique_array)) {
										$link .= where_link($i++, $v["col"], $v["val"], $v["op"]);
									}
								}
								foreach ($unique_array as $k => $v) {
									$link .= where_link($i++, $k, $v);
								}
							}
							
						}
						
						if (!$link && ($link = $adminer->selectLink($row[$key], $field)) === null) {
							if (is_mail($row[$key])) {
								$link = "mailto:$row[$key]";
							}
							if ($protocol = is_url($row[$key])) {
								$link = ($protocol == "http" && $HTTPS
									? $row[$key] // HTTP links from HTTPS pages don't receive Referer automatically
									: "$protocol://www.adminer.org/redirect/?url=" . urlencode($row[$key]) // intermediate page to hide Referer, may be changed to rel="noreferrer" in HTML5
								);
							}
						}
						
						$id = h("val[$unique_idf][" . bracket_escape($key) . "]");
						$value = $_POST["val"][$unique_idf][bracket_escape($key)];
						$h_value = h($value !== null ? $value : $row[$key]);
						$long = strpos($val, "<i>...</i>");
						$editable = is_utf8($val) && $rows[$n][$key] == $row[$key] && !$functions[$key];
						$text = ereg('text|lob', $field["type"]);
						echo (($_GET["modify"] && $editable) || $value !== null
							? "<td>" . ($text ? "<textarea name='$id' cols='30' rows='" . (substr_count($row[$key], "\n") + 1) . "'>$h_value</textarea>" : "<input name='$id' value='$h_value' size='$lengths[$key]'>")
							: "<td id='$id' onclick=\"selectClick(this, event, " . ($long ? 2 : ($text ? 1 : 0)) . ($editable ? "" : ", '" . h(lang(236)) . "'") . ");\">" . $adminer->selectVal($val, $link, $field)
						);
					}
				}
				
				if ($backward_keys) {
					echo "<td>";
				}
				$adminer->backwardKeysPrint($backward_keys, $rows[$n]);
				echo "</tr>\n"; // close to allow white-space: pre
			}
			
			if (is_ajax()) {
				exit;
			}
			echo "</table>\n";
			echo (!$group && $select ? "" : "<script type='text/javascript'>tableCheck();</script>\n");
		}
		
		if (($rows || $page) && !is_ajax()) {
			$exact_count = true;
			if ($_GET["page"] != "last" && +$limit && !$is_group && ($found_rows >= $limit || $page)) {
				$found_rows = found_rows($table_status, $where);
				if ($found_rows < max(1e4, 2 * ($page + 1) * $limit)) {
					// slow with big tables
					$found_rows = reset(slow_query("SELECT COUNT(*) FROM " . table($TABLE) . ($where ? " WHERE " . implode(" AND ", $where) : "")));
				} else {
					$exact_count = false;
				}
			}
			
			if (+$limit && ($found_rows === false || $found_rows > $limit || $page)) {
				echo "<p class='pages'>";
				// display first, previous 4, next 4 and last page
				$max_page = ($found_rows === false
					? $page + (count($rows) >= $limit ? 2 : 1)
					: floor(($found_rows - 1) / $limit)
				);
				echo '<a href="' . h(remove_from_uri("page")) . "\" onclick=\"pageClick(this.href, +prompt('" . lang(237) . "', '" . ($page + 1) . "'), event); return false;\">" . lang(237) . "</a>:";
				echo pagination(0, $page) . ($page > 5 ? " ..." : "");
				for ($i = max(1, $page - 4); $i < min($max_page, $page + 5); $i++) {
					echo pagination($i, $page);
				}
				if ($max_page > 0) {
					echo ($page + 5 < $max_page ? " ..." : "");
					echo ($exact_count && $found_rows !== false
						? pagination($max_page, $page)
						: " <a href='" . h(remove_from_uri("page") . "&page=last") . "' title='~$max_page'>" . lang(238) . "</a>"
					);
				}
				echo (($found_rows === false ? count($rows) + 1 : $found_rows - $page * $limit) > $limit ? ' <a href="' . h(remove_from_uri("page") . "&page=" . ($page + 1)) . '" onclick="return !selectLoadMore(this, ' . (+$limit) . ', \'' . lang(239) . '\');">' . lang(240) . '</a>' : '');
			}
			
			echo "<p>\n";
			echo ($found_rows !== false ? "(" . ($exact_count ? "" : "~ ") . lang(126, $found_rows) . ") " : "");
			echo checkbox("all", 1, 0, lang(241)) . "\n";
			
			if ($adminer->selectCommandPrint()) {
				?>
<fieldset><legend><?php echo lang(34); ?></legend><div>
<input type="submit" value="<?php echo lang(145); ?>"<?php echo ($_GET["modify"] ? '' : ' title="' . lang(230) . '" class="jsonly"'); ?>>
<input type="submit" name="edit" value="<?php echo lang(34); ?>">
<input type="submit" name="clone" value="<?php echo lang(226); ?>">
<input type="submit" name="delete" value="<?php echo lang(148); ?>" onclick="return confirm('<?php echo lang(0); ?> (' + (this.form['all'].checked ? <?php echo $found_rows; ?> : formChecked(this, /check/)) + ')');">
</div></fieldset>
<?php
			}
			
			$format = $adminer->dumpFormat();
			foreach ((array) $_GET["columns"] as $column) {
				if ($column["fun"]) {
					unset($format['sql']);
					break;
				}
			}
			if ($format) {
				print_fieldset("export", lang(118));
				$output = $adminer->dumpOutput();
				echo ($output ? html_select("output", $output, $adminer_import["output"]) . " " : "");
				echo html_select("format", $format, $adminer_import["format"]);
				echo " <input type='submit' name='export' value='" . lang(118) . "'>\n";
				echo "</div></fieldset>\n";
			}
		}
		
		if ($adminer->selectImportPrint()) {
			print_fieldset("import", lang(55), !$rows);
			echo "<input type='file' name='csv_file'> ";
			echo html_select("separator", array("csv" => "CSV,", "csv;" => "CSV;", "tsv" => "TSV"), $adminer_import["format"], 1); // 1 - select
			echo " <input type='submit' name='import' value='" . lang(55) . "'>";
			echo "</div></fieldset>\n";
		}
		
		$adminer->selectEmailPrint(array_filter($email_fields, 'strlen'), $columns);
		
		echo "<p><input type='hidden' name='token' value='$token'></p>\n";
		echo "</form>\n";
	}
}

if (is_ajax()) {
	ob_end_clean();
	exit;
}

} elseif (isset($_GET["variables"])) {
	
$status = isset($_GET["status"]);
page_header($status ? lang(80) : lang(79));

$variables = ($status ? show_status() : show_variables());
if (!$variables) {
	echo "<p class='message'>" . lang(89) . "\n";
} else {
	echo "<table cellspacing='0'>\n";
	foreach ($variables as $key => $val) {
		echo "<tr>";
		echo "<th><code class='jush-" . $jush . ($status ? "status" : "set") . "'>" . h($key) . "</code>";
		echo "<td>" . nbsp($val);
	}
	echo "</table>\n";
}

} elseif (isset($_GET["script"])) {
	
header("Content-Type: text/javascript; charset=utf-8");

if ($_GET["script"] == "db") {
	$sums = array("Data_length" => 0, "Index_length" => 0, "Data_free" => 0);
	foreach (table_status() as $name => $table_status) {
		$id = js_escape($name);
		json_row("Comment-$id", nbsp($table_status["Comment"]));
		if (!is_view($table_status)) {
			foreach (array("Engine", "Collation") as $key) {
				json_row("$key-$id", nbsp($table_status[$key]));
			}
			foreach ($sums + array("Auto_increment" => 0, "Rows" => 0) as $key => $val) {
				if ($table_status[$key] != "") {
					$val = number_format($table_status[$key], 0, '.', lang(8));
					json_row("$key-$id", ($key == "Rows" && $val && $table_status["Engine"] == ($sql == "pgsql" ? "table" : "InnoDB")
						? "~ $val"
						: $val
					));
					if (isset($sums[$key])) {
						// ignore innodb_file_per_table because it is not active for tables created before it was enabled
						$sums[$key] += ($table_status["Engine"] != "InnoDB" || $key != "Data_free" ? $table_status[$key] : 0);
					}
				} elseif (array_key_exists($key, $table_status)) {
					json_row("$key-$id");
				}
			}
		}
	}
	foreach ($sums as $key => $val) {
		json_row("sum-$key", number_format($val, 0, '.', lang(8)));
	}
	json_row("");

} elseif ($_GET["script"] == "kill") {
	$connection->query("KILL " . (+$_POST["kill"]));

} else { // connect
	foreach (count_tables($adminer->databases()) as $db => $val) {
		json_row("tables-" . js_escape($db), $val);
	}
	json_row("");
}

exit; // don't print footer

} else {
	
$tables_views = array_merge((array) $_POST["tables"], (array) $_POST["views"]);

if ($tables_views && !$error && !$_POST["search"]) {
	$result = true;
	$message = "";
	if ($jush == "sql" && count($_POST["tables"]) > 1 && ($_POST["drop"] || $_POST["truncate"] || $_POST["copy"])) {
		queries("SET foreign_key_checks = 0"); // allows to truncate or drop several tables at once
	}
	
	if ($_POST["truncate"]) {
		if ($_POST["tables"]) {
			$result = truncate_tables($_POST["tables"]);
		}
		$message = lang(242);
	} elseif ($_POST["move"]) {
		$result = move_tables((array) $_POST["tables"], (array) $_POST["views"], $_POST["target"]);
		$message = lang(243);
	} elseif ($_POST["copy"]) {
		$result = copy_tables((array) $_POST["tables"], (array) $_POST["views"], $_POST["target"]);
		$message = lang(244);
	} elseif ($_POST["drop"]) {
		if ($_POST["views"]) {
			$result = drop_views($_POST["views"]);
		}
		if ($result && $_POST["tables"]) {
			$result = drop_tables($_POST["tables"]);
		}
		$message = lang(245);
	} elseif ($jush != "sql") {
		$result = ($jush == "sqlite"
			? queries("VACUUM")
			: apply_queries("VACUUM" . ($_POST["optimize"] ? "" : " ANALYZE"), $_POST["tables"])
		);
		$message = lang(246);
	} elseif (!$_POST["tables"]) {
		$message = lang(7);
	} elseif ($result = queries(($_POST["optimize"] ? "OPTIMIZE" : ($_POST["check"] ? "CHECK" : ($_POST["repair"] ? "REPAIR" : "ANALYZE"))) . " TABLE " . implode(", ", array_map('idf_escape', $_POST["tables"])))) {
		while ($row = $result->fetch_assoc()) {
			$message .= "<b>" . h($row["Table"]) . "</b>: " . h($row["Msg_text"]) . "<br>";
		}
	}
	
	queries_redirect(substr(ME, 0, -1), $message, $result);
}

page_header(($_GET["ns"] == "" ? lang(25) . ": " . h(DB) : lang(87) . ": " . h($_GET["ns"])), $error, true);

if ($adminer->homepage()) {
	if ($_GET["ns"] !== "") {
		echo "<h3 id='tables-views'>" . lang(247) . "</h3>\n";
		$tables_list = tables_list();
		if (!$tables_list) {
			echo "<p class='message'>" . lang(7) . "\n";
		} else {
			echo "<form action='' method='post'>\n";
			echo "<p>" . lang(248) . ": <input type='search' name='query' value='" . h($_POST["query"]) . "'> <input type='submit' name='search' value='" . lang(39) . "'>\n";
			if ($_POST["search"] && $_POST["query"] != "") {
				search_tables();
			}
			echo "<table cellspacing='0' class='nowrap checkable' onclick='tableClick(event);' ondblclick='tableClick(event, true);'>\n";
			
			echo '<thead><tr class="wrap"><td><input id="check-all" type="checkbox" onclick="formCheck(this, /^(tables|views)\[/);">';
			echo '<th>' . lang(107);
			echo '<td>' . lang(249);
			echo '<td>' . lang(84);
			echo '<td>' . lang(250);
			echo '<td>' . lang(251);
			echo '<td>' . lang(252);
			echo '<td>' . lang(99);
			echo '<td>' . lang(253);
			echo (support("comment") ? '<td>' . lang(101) : '');
			echo "</thead>\n";
			
			foreach ($tables_list as $name => $type) {
				$view = ($type !== null && !eregi("table", $type));
				echo '<tr' . odd() . '><td>' . checkbox(($view ? "views[]" : "tables[]"), $name, in_array($name, $tables_views, true), "", "formUncheck('check-all');");
				echo '<th><a href="' . h(ME) . 'table=' . urlencode($name) . '" title="' . lang(29) . '">' . h($name) . '</a>';
				if ($view) {
					echo '<td colspan="6"><a href="' . h(ME) . "view=" . urlencode($name) . '" title="' . lang(30) . '">' . lang(106) . '</a>';
					echo '<td align="right"><a href="' . h(ME) . "select=" . urlencode($name) . '" title="' . lang(28) . '">?</a>';
				} else {
					foreach (array(
						"Engine" => array(),
						"Collation" => array(),
						"Data_length" => array("create", lang(31)),
						"Index_length" => array("indexes", lang(110)),
						"Data_free" => array("edit", lang(32)),
						"Auto_increment" => array("auto_increment=1&create", lang(31)),
						"Rows" => array("select", lang(28)),
					) as $key => $link) {
						echo ($link ? "<td align='right'><a href='" . h(ME . "$link[0]=") . urlencode($name) . "' id='$key-" . h($name) . "' title='$link[1]'>?</a>" : "<td id='$key-" . h($name) . "'>&nbsp;");
					}
				}
				echo (support("comment") ? "<td id='Comment-" . h($name) . "'>&nbsp;" : "");
			}
			
			echo "<tr><td>&nbsp;<th>" . lang(227, count($tables_list));
			echo "<td>" . nbsp($jush == "sql" ? $connection->result("SELECT @@storage_engine") : "");
			echo "<td>" . nbsp(db_collation(DB, collations()));
			foreach (array("Data_length", "Index_length", "Data_free") as $key) {
				echo "<td align='right' id='sum-$key'>&nbsp;";
			}
			
			echo "</table>\n";
			echo "<script type='text/javascript'>tableCheck();</script>\n";
			if (!information_schema(DB)) {
				echo "<p>" . (ereg('^(sql|sqlite|pgsql)$', $jush)
					? ($jush != "sqlite" ? "<input type='submit' value='" . lang(254) . "'> " : "")
					. "<input type='submit' name='optimize' value='" . lang(255) . "'> " : ""
				) . ($jush == "sql" ? "<input type='submit' name='check' value='" . lang(256) . "'> <input type='submit' name='repair' value='" . lang(257) . "'> " : "") . "<input type='submit' name='truncate' value='" . lang(258) . "'" . confirm("formChecked(this, /tables/)") . "> <input type='submit' name='drop' value='" . lang(86) . "'" . confirm("formChecked(this, /tables|views/)") . ">\n";
				$databases = (support("scheme") ? schemas() : $adminer->databases());
				if (count($databases) != 1 && $jush != "sqlite") {
					$db = (isset($_POST["target"]) ? $_POST["target"] : (support("scheme") ? $_GET["ns"] : DB));
					echo "<p>" . lang(259) . ": ";
					echo ($databases ? html_select("target", $databases, $db) : '<input name="target" value="' . h($db) . '" autocapitalize="off">');
					echo " <input type='submit' name='move' value='" . lang(260) . "'>";
					echo (support("copy") ? " <input type='submit' name='copy' value='" . lang(261) . "'>" : "");
					echo "\n";
				}
				echo "<input type='hidden' name='token' value='$token'>\n";
			}
			echo "</form>\n";
		}
		
		echo '<p><a href="' . h(ME) . 'create=">' . lang(152) . "</a>\n";
		if (support("view")) {
			echo '<a href="' . h(ME) . 'view=">' . lang(184) . "</a>\n";
		}
	
		if (support("routine")) {
			echo "<h3 id='routines'>" . lang(121) . "</h3>\n";
			$routines = routines();
			if ($routines) {
				echo "<table cellspacing='0'>\n";
				echo '<thead><tr><th>' . lang(162) . '<td>' . lang(96) . '<td>' . lang(201) . "<td>&nbsp;</thead>\n";
				odd('');
				foreach ($routines as $row) {
					echo '<tr' . odd() . '>';
					echo '<th><a href="' . h(ME) . ($row["ROUTINE_TYPE"] != "PROCEDURE" ? 'callf=' : 'call=') . urlencode($row["ROUTINE_NAME"]) . '">' . h($row["ROUTINE_NAME"]) . '</a>';
					echo '<td>' . h($row["ROUTINE_TYPE"]);
					echo '<td>' . h($row["DTD_IDENTIFIER"]);
					echo '<td><a href="' . h(ME) . ($row["ROUTINE_TYPE"] != "PROCEDURE" ? 'function=' : 'procedure=') . urlencode($row["ROUTINE_NAME"]) . '">' . lang(113) . "</a>";
				}
				echo "</table>\n";
			}
			echo '<p>' . (support("procedure") ? '<a href="' . h(ME) . 'procedure=">' . lang(200) . '</a> ' : '') . '<a href="' . h(ME) . 'function=">' . lang(199) . "</a>\n";
		}
		
		if (support("sequence")) {
			echo "<h3 id='sequences'>" . lang(262) . "</h3>\n";
			$sequences = get_vals("SELECT sequence_name FROM information_schema.sequences WHERE sequence_schema = current_schema()");
			if ($sequences) {
				echo "<table cellspacing='0'>\n";
				echo "<thead><tr><th>" . lang(162) . "</thead>\n";
				odd('');
				foreach ($sequences as $val) {
					echo "<tr" . odd() . "><th><a href='" . h(ME) . "sequence=" . urlencode($val) . "'>" . h($val) . "</a>\n";
				}
				echo "</table>\n";
			}
			echo "<p><a href='" . h(ME) . "sequence='>" . lang(206) . "</a>\n";
		}
		
		if (support("type")) {
			echo "<h3 id='user-types'>" . lang(13) . "</h3>\n";
			$user_types = types();
			if ($user_types) {
				echo "<table cellspacing='0'>\n";
				echo "<thead><tr><th>" . lang(162) . "</thead>\n";
				odd('');
				foreach ($user_types as $val) {
					echo "<tr" . odd() . "><th><a href='" . h(ME) . "type=" . urlencode($val) . "'>" . h($val) . "</a>\n";
				}
				echo "</table>\n";
			}
			echo "<p><a href='" . h(ME) . "type='>" . lang(210) . "</a>\n";
		}
		
		if (support("event")) {
			echo "<h3 id='events'>" . lang(122) . "</h3>\n";
			$rows = get_rows("SHOW EVENTS");
			if ($rows) {
				echo "<table cellspacing='0'>\n";
				echo "<thead><tr><th>" . lang(162) . "<td>" . lang(263) . "<td>" . lang(190) . "<td>" . lang(191) . "<td></thead>\n";
				foreach ($rows as $row) {
					echo "<tr>";
					echo "<th>" . h($row["Name"]);
					echo "<td>" . ($row["Execute at"] ? lang(264) . "<td>" . $row["Execute at"] : lang(192) . " " . $row["Interval value"] . " " . $row["Interval field"] . "<td>$row[Starts]");
					echo "<td>$row[Ends]";
					echo '<td><a href="' . h(ME) . 'event=' . urlencode($row["Name"]) . '">' . lang(113) . '</a>';
				}
				echo "</table>\n";
				$event_scheduler = $connection->result("SELECT @@event_scheduler");
				if ($event_scheduler && $event_scheduler != "ON") {
					echo "<p class='error'><code class='jush-sqlset'>event_scheduler</code>: " . h($event_scheduler) . "\n";
				}
			}
			echo '<p><a href="' . h(ME) . 'event=">' . lang(189) . "</a>\n";
		}
		
		if ($tables_list) {
			echo "<script type='text/javascript'>ajaxSetHtml('" . js_escape(ME) . "script=db');</script>\n";
		}
	}
}

}

// each page calls its own page_header(), if the footer should not be called then the page exits
page_footer();
