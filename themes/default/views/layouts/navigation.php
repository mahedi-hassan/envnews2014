<div class="header_wraper">
    <div width="100%">
        <div class="main_nav navbar-fixed-top" id="topnavbar">
        <div class="container">
            <div class="raw-fluid">
                <div class="main_menu">
                    <ul class="gf-menu l1 " >
                        <li class="rot" ><?php echo CHtml::link('Home<em>home page</em>', array('site/index'), array('class' => 'item subtext')); ?></li>
                        <li class="parent news" ><?php echo CHtml::link('News of National Dailies<em>Environment | Business & Development | IT & Science</em><span class="border-fixer"></span>', array(''), array('class' => 'item subtext')); ?>
                            <div class="dropdown columns-3 " style="width:644px;">
                                <div class="column col1"  style="width:220px;">
                                    <ul class="l2">
                                        <li class="parent grouped" ><?php echo CHtml::link('Environment<em>Environmental News</em><span class="border-fixer"></span>', array('news/category', 'id' => 14), array('class' => 'item subtext')); ?>
                                            <ol class="">
                                                <li class="parent" ><?php echo CHtml::link('Climate Change<span class="border-fixer"></span>', array('news/category', 'id' => 18), array('class' => 'item')); ?>
                                                    <div class="dropdown flyout columns-1 " style="width:180px;">
                                                        <div class="column col1"  style="width:180px;">
                                                            <ul class="l4">
                                                                <li><?php echo CHtml::link('Weather Report', array('news/category', 'id' => 49), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Initiatives', array('news/category', 'id' => 50), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Sufferings', array('news/category', 'id' => 51), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Disaster', array('news/category', 'id' => 52), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Policies', array('news/category', 'id' => 53), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Thoughts', array('news/category', 'id' => 54), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('News', array('news/category', 'id' => 55), array('class' => 'item')); ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="parent" ><?php echo CHtml::link('Disaster<span class="border-fixer"></span>', array('news/category', 'id' => 19), array('class' => 'item')); ?>
                                                    <div class="dropdown flyout columns-1 " style="width:180px;">
                                                        <div class="column col1"  style="width:180px;">
                                                            <ul class="l4">
                                                                <li><?php echo CHtml::link('News', array('news/category', 'id' => 56), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Policy', array('news/category', 'id' => 57), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Thoughts', array('news/category', 'id' => 58), array('class' => 'item')); ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="parent" ><?php echo CHtml::link('Earth Quake<span class="border-fixer"></span>', array('news/category', 'id' => 20), array('class' => 'item')); ?>
                                                    <div class="dropdown flyout columns-1 " style="width:180px;">
                                                        <div class="column col1"  style="width:180px;">
                                                            <ul class="l4">
                                                                <li><?php echo CHtml::link('News', array('news/category', 'id' => 59), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Policy/Prepared', array('news/category', 'id' => 60), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Thoughts', array('news/category', 'id' => 61), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('International', array('news/category', 'id' => 62), array('class' => 'item')); ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="parent" ><?php echo CHtml::link('Fire Hazards & Accidents<span class="border-fixer"></span>', array('news/category', 'id' => 21), array('class' => 'item')); ?>
                                                    <div class="dropdown flyout columns-1 " style="width:230px;">
                                                        <div class="column col1"  style="width:230px;">
                                                            <ul class="l4">
                                                                <li><?php echo CHtml::link('Accident News', array('news/category', 'id' => 63), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Policy', array('news/category', 'id' => 64), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Initiatives', array('news/category', 'id' => 65), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Thoughts', array('news/category', 'id' => 66), array('class' => 'item')); ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="parent" ><?php echo CHtml::link('Forest & Flora-Fauna<span class="border-fixer"></span>', array('news/category', 'id' => 22), array('class' => 'item')); ?>
                                                    <div class="dropdown flyout columns-1 " style="width:220px;">
                                                        <div class="column col1"  style="width:220px;">
                                                            <ul class="l4">
                                                                <li><?php echo CHtml::link('News', array('news/category', 'id' => '67'), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Initiatives', array('news/category', 'id' => 68), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Policy', array('news/category', 'id' => 69), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Species', array('news/category', 'id' => 70), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Thoughts', array('news/category', 'id' => 71), array('class' => 'item')); ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="parent" ><?php echo CHtml::link('Health & Nutrition<span class="border-fixer"></span>', array('news/category', 'id' => 23), array('class' => 'item')); ?>
                                                    <div class="dropdown flyout columns-1 " style="width:200px;">
                                                        <div class="column col1"  style="width:200px;">
                                                            <ul class="l4">
                                                                <li><?php echo CHtml::link('News', array('news/category', 'id' => 72), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Drug', array('news/category', 'id' => 73), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Pathology', array('news/category', 'id' => 74), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Policy', array('news/category', 'id' => 75), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Nutrition & Habits', array('news/category', 'id' => 76), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Thoughts', array('news/category', 'id' => 77), array('class' => 'item')); ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="parent" ><?php echo CHtml::link('Land Use<span class="border-fixer"></span>', array('news/category', 'id' => 24), array('class' => 'item')); ?>
                                                    <div class="dropdown flyout columns-1 " style="width:180px;">
                                                        <div class="column col1"  style="width:180px;">
                                                            <ul class="l4">
                                                                <li><?php echo CHtml::link('Changes/News', array('news/category', 'id' => 78), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Encroachment', array('news/category', 'id' => 79), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Policy', array('news/category', 'id' => 80), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Thoughts', array('news/category', 'id' => 81), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Hill tracks', array('news/category', 'id' => 82), array('class' => 'item')); ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="parent" ><?php echo CHtml::link('Pollution/Contamination<span class="border-fixer"></span>', array('news/category', 'id' => 25), array('class' => 'item')); ?>
                                                    <div class="dropdown flyout columns-1 " style="width:220px;">
                                                        <div class="column col1"  style="width:220px;">
                                                            <ul class="l4">
                                                                <li><?php echo CHtml::link('Air', array('news/category', 'id' => 83), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Sound', array('news/category', 'id' => 84), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Water', array('news/category', 'id' => 85), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Plastic', array('news/category', 'id' => 86), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Sea', array('news/category', 'id' => 87), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Thoughts', array('news/category', 'id' => 88), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('News', array('news/category', 'id' => 89), array('class' => 'item')); ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="parent" ><?php echo CHtml::link('River & Cannels<span class="border-fixer"></span>', array('news/category', 'id' => 26), array('class' => 'item')); ?>
                                                    <div class="dropdown flyout columns-1 " style="width:180px;">
                                                        <div class="column col1"  style="width:180px;">
                                                            <ul class="l4">
                                                                <li><?php echo CHtml::link('Encroachment', array('news/category', 'id' => 90), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Water Level', array('news/category', 'id' => 91), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Pollutions', array('news/category', 'id' => 92), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Policy', array('news/category', 'id' => 93), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Good News', array('news/category', 'id' => 94), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Thoughts', array('news/category', 'id' => 95), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('News', array('news/category', 'id' => 96), array('class' => 'item')); ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="parent" ><?php echo CHtml::link('Natural Resource<span class="border-fixer"></span>', array('news/category', 'id' => 27), array('class' => 'item')); ?>
                                                    <div class="dropdown flyout columns-1 " style="width:180px;">
                                                        <div class="column col1"  style="width:180px;">
                                                            <ul class="l4">
                                                                <li><?php echo CHtml::link('News', array('news/category', 'id' => 97), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Water', array('news/category', 'id' => 98), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Mineral', array('news/category', 'id' => 99), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Forest', array('news/category', 'id' => 100), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Thoughts', array('news/category', 'id' => 101), array('class' => 'item')); ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="parent" ><?php echo CHtml::link('Landscape & Gardens<span class="border-fixer"></span>', array('news/category', 'id' => 28), array('class' => 'item')); ?>
                                                    <div class="dropdown flyout columns-1 " style="width:220px;">
                                                        <div class="column col1"  style="width:220px;">
                                                            <ul class="l4">
                                                                <li><?php echo CHtml::link('Initiatives', array('news/category', 'id' => 169), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Thoughts', array('news/category', 'id' => 170), array('class' => 'item')); ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="parent"><?php echo CHtml::link('Transport & Communication<span class="border-fixer"></span>', array('news/category', 'id' => 29), array('class' => 'item')); ?>
                                                    <div class="dropdown flyout columns-1 " style="width:230px;">
                                                        <div class="column col1"  style="width:230px;">
                                                            <ul class="l4">
                                                                <li><?php echo CHtml::link('Road accident', array('news/category', 'id' => 102), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Other accident', array('news/category', 'id' => 225), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Pedestrian Safety', array('news/category', 'id' => 103), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Transport Policy', array('news/category', 'id' => 104), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Future Plan/Development', array('news/category', 'id' => 105), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Present State', array('news/category', 'id' => 106), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Thoughts', array('news/category', 'id' => 107), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('News', array('news/category', 'id' => 108), array('class' => 'item')); ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </li>

                                                <li class="parent" ><?php echo CHtml::link('Urban & Rural Planning<span class="border-fixer"></span>', array('news/category', 'id' => 30), array('class' => 'item')); ?>
                                                    <div class="dropdown flyout columns-1 " style="width:220px;">
                                                        <div class="column col1"  style="width:220px;">
                                                            <ul class="l4">
                                                                <li><?php echo CHtml::link('News', array('news/category', 'id' => 109), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Policy', array('news/category', 'id' => 110), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Thoughts', array('news/category', 'id' => 111), array('class' => 'item')); ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="parent" ><?php echo CHtml::link('Water<span class="border-fixer"></span>', array('news/category', 'id' => 31), array('class' => 'item')); ?>
                                                    <div class="dropdown flyout columns-1 " style="width:180px;">
                                                        <div class="column col1"  style="width:180px;">
                                                            <ul class="l4">
                                                                <li><?php echo CHtml::link('Demand & Supply', array('news/category', 'id' => 112), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('WASA', array('news/category', 'id' => 113), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Municipal Area', array('news/category', 'id' => 114), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Arsenic', array('news/category', 'id' => 115), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Coastal Area', array('news/category', 'id' => 116), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Initiatives', array('news/category', 'id' => 117), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Policy', array('news/category', 'id' => 118), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Policy', array('news/category', 'id' => 119), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('News', array('news/category', 'id' => 120), array('class' => 'item')); ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ol>
                                        </li>
                                    </ul>
                                </div>
                                <div class="column col2"  style="width:220px;">
                                    <ul class="l2">
                                        <li class="parent grouped" ><?php echo CHtml::link('Business & Development<em>Business & Development News</em><span class="border-fixer"></span>', array('news/category', 'id' => 15), array('class' => 'item subtext')); ?>
                                            <ol class="">
                                                <li class="parent" ><?php echo CHtml::link('Agriculture & Crop<span class="border-fixer"></span>', array('news/category', 'id' => 32), array('class' => 'item')); ?>
                                                    <div class="dropdown flyout columns-1 " style="width:220px;">
                                                        <div class="column col1"  style="width:220px;">
                                                            <ul class="l4">
                                                                <li><?php echo CHtml::link('Irrigation', array('news/category', 'id' => 121), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Scarcity', array('news/category', 'id' => 122), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Positive news', array('news/category', 'id' => 123), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Crops', array('news/category', 'id' => 124), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Policy', array('news/category', 'id' => 125), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Thoughts', array('news/category', 'id' => 126), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('News', array('news/category', 'id' => 127), array('class' => 'item')); ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="parent" ><?php echo CHtml::link('Architecture<span class="border-fixer"></span>', array('news/category', 'id' => 33), array('class' => 'item')); ?>
                                                    <div class="dropdown flyout columns-1 " style="width:180px;">
                                                        <div class="column col1"  style="width:180px;">
                                                            <ul class="l4">
                                                                <li><?php echo CHtml::link('Heritage', array('news/category', 'id' => 128), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('History', array('news/category', 'id' => 129), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Crafts', array('news/category', 'id' => 130), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Eco buildings', array('news/category', 'id' => 131), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Eco technology', array('news/category', 'id' => 132), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Thoughts', array('news/category', 'id' => 133), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('News', array('news/category', 'id' => 134), array('class' => 'item')); ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="parent" ><?php echo CHtml::link('Developments<span class="border-fixer"></span>', array('news/category', 'id' => 34), array('class' => 'item')); ?>
                                                    <div class="dropdown flyout columns-1 " style="width:180px;">
                                                        <div class="column col1"  style="width:180px;">
                                                            <ul class="l4">
                                                                <li><?php echo CHtml::link('National Dev News', array('news/category', 'id' => 135), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Initiatives', array('news/category', 'id' => 136), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Thoughts', array('news/category', 'id' => 137), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Poverty & Reductions', array('news/category', 'id' => 138), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Policies', array('news/category', 'id' => 139), array('class' => 'item')); ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="parent" ><?php echo CHtml::link('Economics & Business<span class="border-fixer"></span>', array('news/category', 'id' => 35), array('class' => 'item')); ?>
                                                    <div class="dropdown flyout columns-1 " style="width:220px;">
                                                        <div class="column col1"  style="width:220px;">
                                                            <ul class="l4">
                                                                <li><?php echo CHtml::link('Business', array('news/category', 'id' => 140), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Inflation', array('news/category', 'id' => 141), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Market', array('news/category', 'id' => 142), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Stock Markets', array('news/category', 'id' => 143), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Banks', array('news/category', 'id' => 144), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Company News', array('news/category', 'id' => 145), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Policy', array('news/category', 'id' => 146), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('World Perspective', array('news/category', 'id' => 147), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Thoughts', array('news/category', 'id' => 148), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('News', array('news/category', 'id' => 149), array('class' => 'item')); ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </li>

                                                <li class="parent" ><?php echo CHtml::link('Education<span class="border-fixer"></span>', array('news/category', 'id' => 36), array('class' => 'item')); ?>
                                                    <div class="dropdown flyout columns-1 " style="width:180px;">
                                                        <div class="column col1"  style="width:180px;">
                                                            <ul class="l4">
                                                                <li><?php echo CHtml::link('School & College', array('news/category', 'id' => 150), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Uni Campus', array('news/category', 'id' => 151), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Initiatives', array('news/category', 'id' => 152), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Thoughts', array('news/category', 'id' => 153), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('News', array('news/category', 'id' => 154), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Policy', array('news/category', 'id' => 155), array('class' => 'item')); ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="parent" ><?php echo CHtml::link('Energy & Power<span class="border-fixer"></span>', array('news/category', 'id' => 37), array('class' => 'item')); ?>
                                                    <div class="dropdown flyout columns-1 " style="width:180px;">
                                                        <div class="column col1"  style="width:180px;">
                                                            <ul class="l4">
                                                                <li><?php echo CHtml::link('Electricity/Power', array('news/category', 'id' => 156), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Policy', array('news/category', 'id' => 157), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Oil/Petroleum/coal', array('news/category', 'id' => 158), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Natural Gas/CNG', array('news/category', 'id' => 159), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Renewable Energy', array('news/category', 'id' => 160), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('News', array('news/category', 'id' => 161), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Thoughts', array('news/category', 'id' => 162), array('class' => 'item')); ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="parent" ><?php echo CHtml::link('Law & Justice<span class="border-fixer"></span>', array('news/category', 'id' => 38), array('class' => 'item')); ?>
                                                    <div class="dropdown flyout columns-1 " style="width:180px;">
                                                        <div class="column col1"  style="width:180px;">
                                                            <ul class="l4">
                                                                <li><?php echo CHtml::link('News', array('news/category', 'id' => 175), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Human Rights', array('news/category', 'id' => 171), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Law & Judgments', array('news/category', 'id' => 172), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('ETC', array('news/category', 'id' => 173), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Thoughts', array('news/category', 'id' => 174), array('class' => 'item')); ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="parent"><?php echo CHtml::link('Positive Initiatives<span class="border-fixer"></span>', array('news/category', 'id' => 39), array('class' => 'item')); ?>
                                                    <div class="dropdown flyout columns-1 " style="width:200px;">
                                                        <div class="column col1"  style="width:200px;">
                                                            <ul class="l4">
                                                                <li><?php echo CHtml::link('NGO`s', array('news/category', 'id' => 176), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Club Activities', array('news/category', 'id' => 177), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('GBO', array('news/category', 'id' => 178), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Personel', array('news/category', 'id' => 179), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Success Stories', array('news/category', 'id' => 180), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Grameen Bank', array('news/category', 'id' => 181), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('News', array('news/category', 'id' => 182), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Youth', array('news/category', 'id' => 183), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Dream Maker', array('news/category', 'id' => 227), array('class' => 'item')); ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="parent" ><?php echo CHtml::link('Tourism & Entertainment<span class="border-fixer"></span>', array('news/category', 'id' => 40), array('class' => 'item')); ?>
                                                    <div class="dropdown flyout columns-1 " style="width:225px;">
                                                        <div class="column col1"  style="width:225px;">
                                                            <ul class="l4">
                                                                <li><?php echo CHtml::link('News', array('news/category', 'id' => 189), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Policy', array('news/category', 'id' => 190), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Initiatives', array('news/category', 'id' => 191), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Thoughts', array('news/category', 'id' => 192), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Food & Culture', array('news/category', 'id' => 193), array('class' => 'item')); ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="parent" ><?php echo CHtml::link('World News<span class="border-fixer"></span>', array('news/category', 'id' => 41), array('class' => 'item')); ?>
                                                    <div class="dropdown flyout columns-1 " style="width:180px;">
                                                        <div class="column col1"  style="width:180px;">
                                                            <ul class="l4">
                                                                <li><?php echo CHtml::link('Environment State', array('news/category', 'id' => 194), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Climate Change', array('news/category', 'id' => 195), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Disaster', array('news/category', 'id' => 196), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Economics', array('news/category', 'id' => 197), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Inflation', array('news/category', 'id' => 198), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Technology', array('news/category', 'id' => 199), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Bang. Perspective', array('news/category', 'id' => 200), array('class' => 'item')); ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="parent" ><?php echo CHtml::link('Gender & Humanity<span class="border-fixer"></span>', array('news/category', 'id' => 201), array('class' => 'item')); ?>
                                                    <div class="dropdown flyout columns-1 " style="width:220px;">
                                                        <div class="column col1"  style="width:220px;">
                                                            <ul class="l4">
                                                                <li><?php echo CHtml::link('Gender', array('news/category', 'id' => 202), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Humanity', array('news/category', 'id' => 203), array('class' => 'item')); ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <?php echo CHtml::link('Culture & Tradition', array('news/category', 'id' => 206), array('class' => 'item')); ?>
                                                </li>
                                                <li class="parent" ><?php echo CHtml::link('Public Opinion<span class="border-fixer"></span>', array('news/category', 'id' => 218), array('class' => 'item')); ?>
                                                    <div class="dropdown flyout columns-1 " style="width:180px;">
                                                        <div class="column col1"  style="width:180px;">
                                                            <ul class="l4">
                                                                <li><?php echo CHtml::link('To Editor', array('news/category', 'id' => 219), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Survey Report', array('news/category', 'id' => 220), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Thoughts', array('news/category', 'id' => 221), array('class' => 'item')); ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ol>
                                        </li>
                                    </ul>
                                </div>
                                <div class="column col3"  style="width:200px;">
                                    <ul class="l2">
                                        <li class="parent grouped" ><?php echo CHtml::link('IT & Science<em>IT & Science News</em><span class="border-fixer"></span>', array('news/category', 'id' => 16), array('class' => 'item subtext')); ?>
                                            <ol class="">
                                                <li class="parent" ><?php echo CHtml::link('Science<span class="border-fixer"></span>', array('news/category', 'id' => 42), array('class' => 'item')); ?>
                                                    <div class="dropdown flyout columns-1 " style="width:180px;">
                                                        <div class="column col1"  style="width:180px;">
                                                            <ul class="l4">
                                                                <li><?php echo CHtml::link('Soil', array('news/category', 'id' => 184), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Environment', array('news/category', 'id' => 185), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Medicine', array('news/category', 'id' => 186), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Pure Science', array('news/category', 'id' => 187), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Universe', array('news/category', 'id' => 188), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('News', array('news/category', 'id' => 228), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Thoughts', array('news/category', 'id' => 229), array('class' => 'item')); ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="parent" ><?php echo CHtml::link('IT & Technology<span class="border-fixer"></span>', array('news/category', 'id' => 43), array('class' => 'item')); ?>
                                                    <div class="dropdown flyout columns-1 " style="width:180px;">
                                                        <div class="column col1"  style="width:180px;">
                                                            <ul class="l4">
                                                                <li><?php echo CHtml::link('Technology', array('news/category', 'id' => 163), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Software', array('news/category', 'id' => 164), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Initiatives', array('news/category', 'id' => 165), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('News', array('news/category', 'id' => 166), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Policy', array('news/category', 'id' => 167), array('class' => 'item')); ?></li>
                                                                <li><?php echo CHtml::link('Thoughts', array('news/category', 'id' => 168), array('class' => 'item')); ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ol>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="parent pub" ><?php echo CHtml::link('Publication<em>Book | Report | Magazine</em><span class="border-fixer"></span>', array(''), array('class' => 'item subtext')); ?>
                            <div class="dropdown columns-3 " style="width:544px;">
                                <div class="column col1"  style="width:180px;">
                                    <ul class="l2">
                                        <li><?php echo CHtml::link('Book', array('/book/index'), array('class' => 'item')); ?></li>
                                    </ul>
                                </div>
                                <div class="column col2"  style="width:180px;">
                                    <ul class="l2">
                                        <li><?php echo CHtml::link('Report', array('/report/index'), array('class' => 'item')); ?></li>
                                    </ul>
                                </div>
                                <div class="column col3"  style="width:180px;">
                                    <ul class="l2">
                                        <li><?php echo CHtml::link('Magazine', array('/magazine/index'), array('class' => 'item')); ?></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="parent uce" ><?php echo CHtml::link('Up Coming Events<em>Training | Seminar | Exhibition</em><span class="border-fixer"></span>', array(''), array('class' => 'item subtext')); ?>
                            <div class="dropdown columns-4 " style="width:644px;">
                                <div class="column col1"  style="width:160px;">
                                    <ul class="l2">
                                        <li><?php echo CHtml::link('Training', array(''), array('class' => 'item')); ?></li>
                                    </ul>
                                </div>
                                <div class="column col2"  style="width:160px;">
                                    <ul class="l2">
                                        <li><?php echo CHtml::link('Seminar', array(''), array('class' => 'item')); ?></li>
                                    </ul>
                                </div>
                                <div class="column col3"  style="width:160px;">
                                    <ul class="l2">
                                        <li><?php echo CHtml::link('Exhibition', array(''), array('class' => 'item')); ?></li>
                                    </ul>
                                </div>
                                <div class="column col4"  style="width:160px;">
                                    <ul class="l2">
                                        <li><?php echo CHtml::link('Others', array(''), array('class' => 'item')); ?></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="parent act" ><?php echo CHtml::link('Academic Activities<em>Assignment | Project | Survey</em><span class="border-fixer"></span>', array(''), array('class' => 'item subtext')); ?>
                            <div class="dropdown columns-3 " style="width:484px;">
                                <div class="column col1"  style="width:160px;">
                                    <ul class="l2">
                                        <li><?php echo CHtml::link('Assignment', array(''), array('class' => 'item')); ?></li>
                                    </ul>
                                </div>
                                <div class="column col2"  style="width:160px;">
                                    <ul class="l2">
                                        <li><?php echo CHtml::link('Project/Thesis', array('/projectThesis/index'), array('class' => 'item')); ?></li>
                                    </ul>
                                </div>
                                <div class="column col3"  style="width:160px;">
                                    <ul class="l2">
                                        <li><?php echo CHtml::link('Survey', array(''), array('class' => 'item')); ?></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="parent mor" ><?php echo CHtml::link('More<em>Extras</em><span class="border-fixer"></span>', array(''), array('class' => 'item subtext')); ?>
                            <div class="dropdown columns-1 " style="width:180px;">
                                <div class="column col1"  style="width:180px;">
                                    <ul class="l2">
                                        <li><?php echo CHtml::link('About Us', array('content/view', 'id' => 1), array('class' => 'item')); ?></li>
                                        <li><?php echo CHtml::link('Photos & Videos', array('site/galleries'), array('class' => 'item')); ?></li>
                                    </ul>
                                </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>                            

    </div>
    
                            <div class="header">
                                <div class="container">
                                    <div class="row-fluid">
                                        <div class="span4">
                                            <div class="logo">
                                                <?php
                                                $image = CHtml::image(Yii::app()->baseUrl . '/themes/default/images/envnews.png');
                                                echo CHtml::link($image . '<span>EnvNews</span><br /><small>Information is Power</small>', array('/site/index'));
                                                ?>
                                            </div>
                                        </div>
                                        <div class="span4"></div>    
                                        <div class="span4">
                                            <div class="row-fluid">
                                                <div class="span12">
                                                    <div class="top_bar">
                                                        <?php
                                                        $this->widget('bootstrap.widgets.TbNavbar', array(
                                                            'display' => 'none',
                                                            'collapse' => true,
                                                            'items' => array(
                                                                array(
                                                                    'class' => 'bootstrap.widgets.TbNav',
                                                                    'htmlOptions' => array('class' => 'pull-right'),
                                                                    'items' => array(
                                                                        array('label' => 'Help', 'url' => '', 'items' => array(
                                                                                array('label' => 'FAQ', 'url' => array('content/view', 'id' => 1)),
                                                                                array('label' => 'Guide line', 'url' => array('content/view', 'id' => 2)),
                                                                            )),
                                                                        array('label' => 'Log in', 'url' => array('site/login'), 'visible' => Yii::app()->user->isGuest),
                                                                        array('label' => 'Register', 'url' => array('user/create'), 'visible' => Yii::app()->user->isGuest),
                                                                        array('label' => $this->getUserName(), 'icon' => 'icon-user', 'url' => '', 'visible' => !Yii::app()->user->isGuest, 'items' => array(
                                                                                array('label' => 'Profile Page', 'icon' => 'icon-road', 'url' => array('user/view', 'id' => Yii::app()->user->id), 'visible' => !Yii::app()->user->isGuest),
                                                                                array('label' => 'Profile Edit', 'icon' => 'icon-edit', 'url' => array('user/update', 'id' => Yii::app()->user->id), 'visible' => !Yii::app()->user->isGuest),
                                                                                array('label' => 'Change Password', 'icon' => 'icon-refresh', 'url' => array('user/edit', 'id' => Yii::app()->user->id), 'visible' => !Yii::app()->user->isGuest),
                                                                                array('label' => 'Logout (' . Yii::app()->user->name . ')', 'icon' => 'icon-off', 'url' => array('site/logout'), 'visible' => !Yii::app()->user->isGuest),
                                                                            )),
                                                                    ),
                                                                ),
                                                            ),
                                                        ));
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="span12">
                                                    <div class="search_bar">
                                                        <span class="pull-right">
                                                            <?php //echo CHtml::form(Yii::app()->createUrl('news/search'), 'get') ?>
                                                            <?php //echo CHtml::textField('search_key', '', array('placeholder' => 'Search')); ?>
                                                            <?php //echo CHtml::submitButton('Go'); ?>
                                                            <?php //echo CHtml::endForm() ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>