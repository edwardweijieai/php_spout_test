
## Input Excel Data

```cmd=
US$3.86 
```

### Output Result

```cmd=
array(1) {
  ["工作表1"]=>
  array(1) {
    [0]=>
    array(1) {
      [0]=>
      array(1) {
        [0]=>
        string(13) "US$#,##0.00_)"
      }
    }
  }
}
```

### github issues

* https://opensource.box.com/spout/docs/#datetime-formatting
* https://github.com/box/spout/issues/481
* https://github.com/box/spout/issues/578
* https://github.com/box/spout/issues/587

### require

"box/spout": "^3.0.0",