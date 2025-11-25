export function calculate({ landArea, far, bcr, pricePerTsubo }) {
    if (landArea <= 0 || far <= 0 || bcr <= 0 || pricePerTsubo <= 0) {
        return { error: true };
    }

    // 建築可能面積 ㎡
    const maxFloorArea = landArea * (bcr / 100);
    const buildableArea = maxFloorArea * (far / 100);
    // 建築可能面積 坪
    const buildableAreaTsubo = buildableArea / 3.3;
    // 建築費用
    const buildingCost = buildableAreaTsubo * pricePerTsubo;

    return {
        error: false,
        maxFloorArea: Math.floor(maxFloorArea),
        buildableArea: Math.floor(buildableArea),
        buildableAreaTsubo: Math.floor(buildableAreaTsubo),
        buildingCost: Math.floor(buildingCost),
    };
}
