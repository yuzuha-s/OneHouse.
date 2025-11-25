import { describe, it, expect } from "vitest";
import { calculate } from "../calculate.js";

describe("", () => {
    it("計算結果が正しいか", () => {
        const result = calculate({
            landArea: 100,
            far: 200,
            bcr: 60,
            pricePerTsubo: 87,
        });

        expect(result.maxFloorArea).toBe(60);
        expect(result.buildableArea).toBe(120);
        // buildableAreaTsubo

        // buildingCost =
    });
    it("// 入力が０または負の場合の扱い", ()=> {

    });
});


// 小数点処理が正しいか
// 予想外の値(異常系)
