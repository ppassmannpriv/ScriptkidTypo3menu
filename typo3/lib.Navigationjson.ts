lib.navigationJson = COA
lib.navigationJson.10 = HMENU
lib.navigationJson.10 {
    wrap = <script id="navigation-json" type="text/json">{|}</script>
    1 = TMENU
    1 {
      expAll = 1
      noBlur = 1
      wrap = |
      stdWrap.wrap = "children": [|]
      NO {
        wrapItemAndSub = {|}, |*| {|}, |*| {|}
        linkWrap = |
        ATagBeforeWrap = 0
        doNotLinkIt = 1
        stdWrap.htmlSpecialChars = 0
        stdWrap.cObject = COA
        stdWrap.cObject {
          10 = TEXT
          10 {
            field = title
            htmlSpecialChars = 1
            wrap = "title":"|",
          }
          20 = TEXT
          20 {
            field = uid
            htmlSpecialChars = 1
            wrap = "url":"|"
            typolink.parameter.field = uid
            typolink.returnLast = url
          }
        }
      }
      IFSUB = 1
      IFSUB {
        wrapItemAndSub = {|}, |*| {|}, |*| {|}
        linkWrap = |
        ATagBeforeWrap = 0
        doNotLinkIt = 1
        stdWrap.htmlSpecialChars = 0
        stdWrap.cObject = COA
        stdWrap.cObject {
          10 = TEXT
          10 {
            field = title
            htmlSpecialChars = 1
            wrap = "title":"|",
          }
          20 = TEXT
          20 {
            field = uid
            htmlSpecialChars = 1
            wrap = "url":"|",
            typolink.parameter.field = uid
            typolink.returnLast = url
          }
        }
      }
        CUR = 1
        CUR {
        wrapItemAndSub = {|}, |*| {|}, |*| {|}
        linkWrap = |
        ATagBeforeWrap = 0
        doNotLinkIt = 1
        stdWrap.htmlSpecialChars = 0
        stdWrap.cObject = COA
        stdWrap.cObject {
          10 = TEXT
          10 {
            field = title
            htmlSpecialChars = 1
            wrap = "title":"|",
          }
                15 = TEXT
                15.value = "current": true,
          20 = TEXT
          20 {
            field = uid
            htmlSpecialChars = 1
            wrap = "url":"|"
            typolink.parameter.field = uid
            typolink.returnLast = url
          }
        }
      }
        CURIFSUB = 1
        CURIFSUB {
            wrapItemAndSub = {|}, |*| {|}, |*| {|}
            linkWrap = |
            ATagBeforeWrap = 0
            doNotLinkIt = 1
            stdWrap.htmlSpecialChars = 0
            stdWrap.cObject = COA
            stdWrap.cObject {
                10 = TEXT
                10 {
                    field = title
                    htmlSpecialChars = 1
                    wrap = "title":"|",
                }
                15 = TEXT
                15.value = "current": true,
                20 = TEXT
                20 {
                    field = uid
                    htmlSpecialChars = 1
                    wrap = "url":"|",
                    typolink.parameter.field = uid
                    typolink.returnLast = url
                }
            }
        }
        ACT = 1
        ACT {
            wrapItemAndSub = {|}, |*| {|}, |*| {|}
            linkWrap = |
            ATagBeforeWrap = 0
            doNotLinkIt = 1
            stdWrap.htmlSpecialChars = 0
            stdWrap.cObject = COA
            stdWrap.cObject {
                10 = TEXT
                10 {
                    field = title
                    htmlSpecialChars = 1
                    wrap = "title":"|",
                }
                15 = TEXT
                15.value = "current": true,
                20 = TEXT
                20 {
                    field = uid
                    htmlSpecialChars = 1
                    wrap = "url":"|"
                    typolink.parameter.field = uid
                    typolink.returnLast = url
                }
            }
        }
        ACTIFSUB = 1
        ACTIFSUB {
            wrapItemAndSub = {|}, |*| {|}, |*| {|}
            linkWrap = |
            ATagBeforeWrap = 0
            doNotLinkIt = 1
            stdWrap.htmlSpecialChars = 0
            stdWrap.cObject = COA
            stdWrap.cObject {
                10 = TEXT
                10 {
                    field = title
                    htmlSpecialChars = 1
                    wrap = "title":"|",
                }
                15 = TEXT
                15.value = "active": true,
                20 = TEXT
                20 {
                    field = uid
                    htmlSpecialChars = 1
                    wrap = "url":"|",
                    typolink.parameter.field = uid
                    typolink.returnLast = url
                }
            }
        }
    }
    2 < .1
    3 < .1
    4 < .1
    5 < .1
    6 < .1
    7 < .1
    8 < .1
    9 < .1
}
